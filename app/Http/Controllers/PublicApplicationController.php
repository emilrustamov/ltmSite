<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\City;
use App\Models\Source;
use App\Models\WorkFormat;
use App\Models\Education;
use App\Models\JobPosition;
use App\Models\TechnicalSkill;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PublicApplicationController extends Controller
{
    public function create(Request $request)
    {
        $cities = City::active()->ordered()->get();
        $sources = Source::active()->ordered()->get();
        $workFormats = WorkFormat::active()->ordered()->get();
        $educations = Education::active()->ordered()->get();
        $jobPositions = JobPosition::active()->ordered()->get();
        $technicalSkills = TechnicalSkill::active()->ordered()->get();
        $languages = Language::active()->ordered()->get();

        $lang = 'ru';

        $selectedPosition = null;
        if ($request->has('position')) {
            $selectedPosition = JobPosition::find($request->position);
        }

        return view('public.applications.create', compact(
            'cities',
            'sources',
            'workFormats',
            'educations',
            'jobPositions',
            'technicalSkills',
            'languages',
            'lang',
            'selectedPosition'
        ));
    }

    public function store(Request $request)
    {
        $positionParam = $request->input('position');

        $validationRules = [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'expected_salary' => 'required|string|max:255',
            'personal_info' => 'nullable|string',
            'contact_info' => 'nullable|string',
            'linkedin_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'registration_address' => 'required|string|max:500',
            'custom_language' => 'nullable|string|max:255',
            'custom_technical_skill' => 'nullable|string|max:255',
            'cv_file' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'professional_plans' => 'required|string',
            'other_notes' => 'nullable|string',
            'work_experiences' => 'nullable|array',
            'work_experiences.*.company_name' => 'required_with:work_experiences|string|max:255',
            'work_experiences.*.position' => 'required_with:work_experiences|string|max:255',
            'work_experiences.*.start_date' => 'required_with:work_experiences|date',
            'work_experiences.*.end_date' => 'nullable|date|after:work_experiences.*.start_date',
            'work_experiences.*.description' => 'nullable|string',
            'educational_institutions' => 'nullable|array',
            'educational_institutions.*.institution_name' => 'required_with:educational_institutions|string|max:255',
            'educational_institutions.*.degree' => 'nullable|string|max:255',
            'educational_institutions.*.faculty' => 'nullable|string|max:255',
            'educational_institutions.*.start_date' => 'nullable|date',
            'educational_institutions.*.end_date' => 'nullable|date|after:educational_institutions.*.start_date',
            'educational_institutions.*.description' => 'nullable|string',
            'job_positions' => 'nullable|array',
            'job_positions.*' => 'exists:job_positions,id',
            'technical_skills' => 'nullable|array',
            'technical_skills.*' => 'exists:technical_skills,id',
            'languages' => 'nullable|array',
            'languages.*' => 'exists:languages,id',
        ];

        if ($request->has('custom_city_check')) {
            $validationRules['custom_city'] = 'required|string|max:255';
            $validationRules['city_id'] = 'nullable|exists:cities,id';
        } else {
            $validationRules['city_id'] = 'required|exists:cities,id';
            $validationRules['custom_city'] = 'nullable|string|max:255';
        }

        if ($request->has('custom_source_check')) {
            $validationRules['custom_source'] = 'required|string|max:255';
            $validationRules['source_id'] = 'nullable|exists:sources,id';
        } else {
            $validationRules['source_id'] = 'required|exists:sources,id';
            $validationRules['custom_source'] = 'nullable|string|max:255';
        }

        if ($request->has('custom_work_format_check')) {
            $validationRules['custom_work_format'] = 'required|string|max:255';
            $validationRules['work_format_id'] = 'nullable|exists:work_formats,id';
        } else {
            $validationRules['work_format_id'] = 'required|exists:work_formats,id';
            $validationRules['custom_work_format'] = 'nullable|string|max:255';
        }

        if ($request->has('custom_education_check')) {
            $validationRules['custom_education'] = 'required|string|max:255';
            $validationRules['education_id'] = 'nullable|exists:educations,id';
        } else {
            $validationRules['education_id'] = 'required|exists:educations,id';
            $validationRules['custom_education'] = 'nullable|string|max:255';
        }

        $validated = $request->validate($validationRules);

        // Дополнительная проверка на спам: дубликаты по email или IP за последние 24 часа
        $recentDuplicate = Application::where(function($query) use ($validated, $request) {
                $query->where('email', $validated['email'])
                      ->orWhere('phone', $validated['phone']);
            })
            ->where('created_at', '>=', now()->subHours(24))
            ->exists();

        if ($recentDuplicate) {
            \Log::warning('Spam blocked: duplicate application', [
                'ip' => $request->ip(),
                'email' => $validated['email'],
                'phone' => $validated['phone'],
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Вы уже отправляли заявку недавно. Пожалуйста, подождите перед повторной отправкой.');
        }

        // Проверка на подозрительные паттерны в данных
        if ($this->containsSpamPatterns($validated)) {
            \Log::warning('Spam blocked: suspicious patterns detected', [
                'ip' => $request->ip(),
                'email' => $validated['email'],
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Обнаружены подозрительные данные. Пожалуйста, проверьте введенную информацию.');
        }

        $cityId = $request->has('custom_city_check') ? null : ($validated['city_id'] ?? null);
        $customCity = $validated['custom_city'] ?? null;

        $sourceId = $request->has('custom_source_check') ? null : ($validated['source_id'] ?? null);
        $customSource = $validated['custom_source'] ?? null;

        $workFormatId = $request->has('custom_work_format_check') ? null : ($validated['work_format_id'] ?? null);
        $customWorkFormat = $validated['custom_work_format'] ?? null;

        $educationId = $request->has('custom_education_check') ? null : ($validated['education_id'] ?? null);
        $customEducation = $validated['custom_education'] ?? null;

        // Сохраняем файл CV ПЕРЕД созданием Application, чтобы он был доступен при отправке email
        $cvFilePath = null;
        if ($request->hasFile('cv_file')) {
            // Используем store() для сохранения файла - он вернет относительный путь типа cv/filename.pdf
            $cvFilePath = $request->file('cv_file')->store('cv', 'public');
        }

        $application = Application::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'date_of_birth' => $validated['date_of_birth'],
            'expected_salary' => $validated['expected_salary'],
            'personal_info' => $validated['personal_info'],
            'contact_info' => $validated['contact_info'],
            'linkedin_url' => $validated['linkedin_url'],
            'github_url' => $validated['github_url'],
            'city_id' => $cityId,
            'custom_city' => $customCity,
            'registration_address' => $validated['registration_address'],
            'source_id' => $sourceId,
            'custom_source' => $customSource,
            'work_format_id' => $workFormatId,
            'custom_work_format' => $customWorkFormat,
            'education_id' => $educationId,
            'custom_education' => $customEducation,
            'custom_language' => $validated['custom_language'],
            'custom_technical_skill' => $validated['custom_technical_skill'],
            'professional_plans' => $validated['professional_plans'],
            'other_notes' => $validated['other_notes'],
            'cv_file' => $cvFilePath, // Файл уже сохранен, добавляем путь сразу
            'status' => true,
        ]);

        if (!empty($validated['job_positions'])) {
            $application->jobPositions()->sync($validated['job_positions']);
        }

        if (!empty($validated['technical_skills'])) {
            $application->technicalSkills()->sync($validated['technical_skills']);
        }

        if (!empty($validated['languages'])) {
            $application->languages()->sync($validated['languages']);
        }

        if (!empty($validated['work_experiences'])) {
            foreach ($validated['work_experiences'] as $index => $experience) {
                $application->workExperiences()->create([
                    'company_name' => $experience['company_name'],
                    'position' => $experience['position'],
                    'start_date' => $experience['start_date'],
                    'end_date' => $experience['end_date'] ?? null,
                    'description' => $experience['description'] ?? null,
                ]);
            }
        }

        if (!empty($validated['educational_institutions'])) {
            foreach ($validated['educational_institutions'] as $index => $education) {
                $application->educationalInstitutions()->create([
                    'institution_name' => $education['institution_name'],
                    'degree' => $education['degree'] ?? null,
                    'faculty' => $education['faculty'] ?? null,
                    'start_date' => $education['start_date'] ?? null,
                    'end_date' => $education['end_date'] ?? null,
                    'description' => $education['description'] ?? null,
                ]);
            }
        }

        $redirectParams = [];
        if (!empty($positionParam)) {
            $redirectParams['position'] = $positionParam;
        }

        return redirect()
            ->route('applications.create', $redirectParams)
            ->with('success', 'Ваша заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.');
    }

    public function getSkillsByPositions(Request $request)
    {
        $positionIds = $request->input('positions', []);

        if (empty($positionIds)) {
            return response()->json(['skills' => []]);
        }

        $skills = \App\Models\TechnicalSkill::whereHas('jobPositions', function ($query) use ($positionIds) {
            $query->whereIn('job_positions.id', $positionIds);
        })->active()->pluck('id')->toArray();

        return response()->json(['skills' => $skills]);
    }

    /**
     * Проверка на спам-паттерны в данных
     */
    private function containsSpamPatterns(array $data): bool
    {
        // Проверка на повторяющиеся символы (например, "aaaaaa" или "111111")
        $spamPatterns = [
            '/(.)\1{5,}/', // Повторяющийся символ более 5 раз
            '/^(.)\1+$/',  // Все символы одинаковые
        ];

        $fieldsToCheck = ['name', 'surname', 'email', 'phone', 'professional_plans', 'personal_info'];
        
        foreach ($fieldsToCheck as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                continue;
            }

            $value = (string) $data[$field];
            
            // Проверка на повторяющиеся символы
            foreach ($spamPatterns as $pattern) {
                if (preg_match($pattern, $value)) {
                    return true;
                }
            }

            // Проверка на подозрительно короткие значения в важных полях
            if (in_array($field, ['name', 'surname']) && strlen($value) < 2) {
                return true;
            }

            // Проверка на слишком длинные значения (возможный спам)
            if (strlen($value) > 1000 && in_array($field, ['professional_plans', 'personal_info', 'other_notes'])) {
                return true;
            }
        }

        // Проверка email на подозрительные домены
        if (isset($data['email'])) {
            $suspiciousDomains = [
                'tempmail', 'guerrillamail', 'mailinator', '10minutemail',
                'throwaway', 'fake', 'spam', 'test'
            ];
            
            $emailLower = strtolower($data['email']);
            foreach ($suspiciousDomains as $domain) {
                if (str_contains($emailLower, $domain)) {
                    return true;
                }
            }
        }

        return false;
    }
}
