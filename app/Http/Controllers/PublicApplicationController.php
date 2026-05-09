<?php

namespace App\Http\Controllers;

use App\Support\FormProtection;
use App\Models\Application;
use App\Models\City;
use App\Models\Source;
use App\Models\WorkFormat;
use App\Models\Education;
use App\Models\JobPosition;
use App\Models\TechnicalSkill;
use App\Models\Language;
use Illuminate\Http\Request;

class PublicApplicationController extends Controller
{
    /**
     * @var array<string, array{check: string, custom: string, id: string, table: string}>
     */
    private const CUSTOM_FIELD_MAP = [
        'city' => [
            'check' => 'custom_city_check',
            'custom' => 'custom_city',
            'id' => 'city_id',
            'table' => 'cities',
        ],
        'source' => [
            'check' => 'custom_source_check',
            'custom' => 'custom_source',
            'id' => 'source_id',
            'table' => 'sources',
        ],
        'work_format' => [
            'check' => 'custom_work_format_check',
            'custom' => 'custom_work_format',
            'id' => 'work_format_id',
            'table' => 'work_formats',
        ],
        'education' => [
            'check' => 'custom_education_check',
            'custom' => 'custom_education',
            'id' => 'education_id',
            'table' => 'educations',
        ],
    ];

    /**
     * Show public application form.
     */
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

    /**
     * Store public application.
     */
    public function store(Request $request)
    {
        if (trim((string) $request->input('website', '')) !== '') {
            abort(403);
        }

        $protectionError = app(FormProtection::class)->validate($request);
        if ($protectionError !== null) {
            return $this->errorResponse($request, $protectionError, 422, true);
        }

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

        $this->applyCustomFieldRules($request, $validationRules);

        $validated = $request->validate($validationRules);

        $recentDuplicate = Application::where(function ($query) use ($validated) {
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

            return $this->errorResponse(
                $request,
                'Вы уже отправляли заявку недавно. Пожалуйста, подождите перед повторной отправкой.',
                422,
                true
            );
        }

        if ($this->containsSpamPatterns($validated)) {
            \Log::warning('Spam blocked: suspicious patterns detected', [
                'ip' => $request->ip(),
                'email' => $validated['email'],
            ]);

            return $this->errorResponse(
                $request,
                'Обнаружены подозрительные данные. Пожалуйста, проверьте введенную информацию.',
                422,
                true
            );
        }

        $locationData = $this->resolveLocationData($request, $validated);
        $cvFilePath = null;
        if ($request->hasFile('cv_file')) {
            $cvFilePath = $request->file('cv_file')->store('cv', 'private');
        }

        $application = Application::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'date_of_birth' => $validated['date_of_birth'],
            'expected_salary' => $validated['expected_salary'],
            'personal_info' => $validated['personal_info'] ?? null,
            'contact_info' => $validated['contact_info'] ?? null,
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'github_url' => $validated['github_url'] ?? null,
            'city_id' => $locationData['city_id'],
            'custom_city' => $locationData['custom_city'],
            'registration_address' => $validated['registration_address'],
            'source_id' => $locationData['source_id'],
            'custom_source' => $locationData['custom_source'],
            'work_format_id' => $locationData['work_format_id'],
            'custom_work_format' => $locationData['custom_work_format'],
            'education_id' => $locationData['education_id'],
            'custom_education' => $locationData['custom_education'],
            'custom_language' => $validated['custom_language'] ?? null,
            'custom_technical_skill' => $validated['custom_technical_skill'] ?? null,
            'professional_plans' => $validated['professional_plans'],
            'other_notes' => $validated['other_notes'] ?? null,
            'cv_file' => $cvFilePath,
            'status' => true,
        ]);

        $this->syncRelationIfPresent($application, 'jobPositions', $validated['job_positions'] ?? []);
        $this->syncRelationIfPresent($application, 'technicalSkills', $validated['technical_skills'] ?? []);
        $this->syncRelationIfPresent($application, 'languages', $validated['languages'] ?? []);

        $this->createManyIfPresent($application, 'workExperiences', $validated['work_experiences'] ?? []);
        $this->createManyIfPresent($application, 'educationalInstitutions', $validated['educational_institutions'] ?? []);

        $redirectParams = [];
        if (!empty($positionParam)) {
            $redirectParams['position'] = $positionParam;
        }

        return $this->successResponse(
            $request,
            'Ваша заявка успешно отправлена! Мы свяжемся с вами в ближайшее время.',
            $redirectParams
        );
    }

    /**
     * Return available skills by selected positions.
     */
    public function getSkillsByPositions(Request $request)
    {
        $validated = $request->validate([
            'positions' => ['nullable', 'array', 'max:20'],
            'positions.*' => ['integer', 'exists:job_positions,id'],
        ]);

        $positionIds = $validated['positions'] ?? [];

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
        $spamPatterns = [
            '/(.)\1{5,}/',
            '/^(.)\1+$/',
        ];

        $fieldsToCheck = ['name', 'surname', 'email', 'phone', 'professional_plans', 'personal_info'];
        
        foreach ($fieldsToCheck as $field) {
            if (!isset($data[$field]) || empty($data[$field])) {
                continue;
            }

            $value = (string) $data[$field];

            foreach ($spamPatterns as $pattern) {
                if (preg_match($pattern, $value)) {
                    return true;
                }
            }

            if (in_array($field, ['name', 'surname']) && strlen($value) < 2) {
                return true;
            }

            if (strlen($value) > 1000 && in_array($field, ['professional_plans', 'personal_info', 'other_notes'])) {
                return true;
            }
        }

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

    /**
     * @param array<string, string> $validationRules
     * @return void
     */
    private function applyCustomFieldRules(Request $request, array &$validationRules): void
    {
        foreach (self::CUSTOM_FIELD_MAP as $field) {
            if ($request->has($field['check'])) {
                $validationRules[$field['custom']] = 'required|string|max:255';
                $validationRules[$field['id']] = "nullable|exists:{$field['table']},id";
            } else {
                $validationRules[$field['id']] = "required|exists:{$field['table']},id";
                $validationRules[$field['custom']] = 'nullable|string|max:255';
            }
        }
    }

    /**
     * @param array<string, mixed> $validated
     * @return array<string, mixed>
     */
    private function resolveLocationData(Request $request, array $validated): array
    {
        $data = [];

        foreach (self::CUSTOM_FIELD_MAP as $field) {
            $isCustom = $request->has($field['check']);
            $data[$field['id']] = $isCustom ? null : ($validated[$field['id']] ?? null);
            $data[$field['custom']] = $validated[$field['custom']] ?? null;
        }

        return $data;
    }

    /**
     * @param array<int, mixed> $ids
     * @return void
     */
    private function syncRelationIfPresent(Application $application, string $relation, array $ids): void
    {
        if (!empty($ids)) {
            $application->{$relation}()->sync($ids);
        }
    }

    /**
     * @param array<int, array<string, mixed>> $records
     * @return void
     */
    private function createManyIfPresent(Application $application, string $relation, array $records): void
    {
        if (!empty($records)) {
            $application->{$relation}()->createMany($records);
        }
    }

    /**
     * @param array<string, mixed> $redirectParams
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function successResponse(Request $request, string $message, array $redirectParams = [])
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $message]);
        }

        return redirect()
            ->route('applications.create', $redirectParams)
            ->with('success', $message);
    }

    /**
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function errorResponse(Request $request, string $message, int $status, bool $withInput = false)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $message], $status);
        }

        $redirect = redirect()->back();
        if ($withInput) {
            $redirect = $redirect->withInput();
        }

        return $redirect->with('error', $message);
    }
}
