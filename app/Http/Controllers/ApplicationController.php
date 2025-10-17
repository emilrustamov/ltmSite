<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\LogsUserActivity;

class ApplicationController extends Controller
{
    use LogsUserActivity;
    
    // Список всех заявок (админ)
    public function index()
    {
        // Проверка разрешения на просмотр заявок
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра заявок');
        }

        $applications = Application::with(['city', 'source', 'workFormat', 'education'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        return view('admin.applications.index', [
            'applications' => $applications,
        ]);
    }

    // Просмотр заявки
    public function show(Application $application)
    {
        // Проверка разрешения на просмотр заявок
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра заявок');
        }

        $application->load([
            'city', 
            'source', 
            'workFormat', 
            'education', 
            'jobPositions', 
            'technicalSkills', 
            'languages', 
            'workExperiences', 
            'educationalInstitutions'
        ]);

        return view('admin.applications.show', compact('application'));
    }

    // Форма создания новой заявки
    public function create()
    {
        return view('admin.applications.create');
    }

    // Сохранение новой заявки
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'expected_salary' => 'required|string|max:255',
            'personal_info' => 'nullable|string',
            'contact_info' => 'nullable|string',
            'general_info' => 'nullable|string',
            'linkedin_url' => 'nullable|url|max:255',
            'github_url' => 'nullable|url|max:255',
            'city_id' => 'nullable|exists:cities,id',
            'custom_city' => 'nullable|string|max:255',
            'registration_address' => 'required|string|max:500',
            'source_id' => 'required|exists:sources,id',
            'custom_source' => 'nullable|string|max:255',
            'work_format_id' => 'required|exists:work_formats,id',
            'custom_work_format' => 'nullable|string|max:255',
            'education_id' => 'required|exists:educations,id',
            'custom_education' => 'nullable|string|max:255',
            'custom_language' => 'nullable|string|max:255',
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
            'status' => 'boolean',
        ]);

        // Обработка кастомных полей
        $cityId = $validated['city_id'];
        $customCity = null;
        if ($request->has('custom_city_check') && $validated['custom_city']) {
            $cityId = null;
            $customCity = $validated['custom_city'];
        }

        $sourceId = $validated['source_id'];
        $customSource = null;
        if ($request->has('custom_source_check') && $validated['custom_source']) {
            $sourceId = null;
            $customSource = $validated['custom_source'];
        }

        $workFormatId = $validated['work_format_id'];
        $customWorkFormat = null;
        if ($request->has('custom_work_format_check') && $validated['custom_work_format']) {
            $workFormatId = null;
            $customWorkFormat = $validated['custom_work_format'];
        }

        $educationId = $validated['education_id'];
        $customEducation = null;
        if ($request->has('custom_education_check') && $validated['custom_education']) {
            $educationId = null;
            $customEducation = $validated['custom_education'];
        }

        // Создаём заявку
        $application = Application::create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'date_of_birth' => $validated['date_of_birth'],
            'expected_salary' => $validated['expected_salary'],
            'personal_info' => $validated['personal_info'],
            'contact_info' => $validated['contact_info'],
            'general_info' => $validated['general_info'],
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
            'professional_plans' => $validated['professional_plans'],
            'other_notes' => $validated['other_notes'],
            // work_experience убрано - теперь в отдельной таблице
            'status' => $request->has('status') ? 1 : 0,
        ]);

        // Загрузка CV файла
        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/cv'), $filename);
            $application->update(['cv_file' => 'uploads/cv/' . $filename]);
        }

        // Связываем с должностями
        if (!empty($validated['job_positions'])) {
            $application->jobPositions()->sync($validated['job_positions']);
        }

        // Связываем с техническими навыками
        if (!empty($validated['technical_skills'])) {
            $application->technicalSkills()->sync($validated['technical_skills']);
        }

        // Связываем с языками
        if (!empty($validated['languages'])) {
            $application->languages()->sync($validated['languages']);
        }

        // Создаем записи опыта работы
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

        // Создаем записи учебных заведений
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

        // Логируем создание
        $this->logCreate('Application', $application->id, [
            'name' => $application->name,
            'surname' => $application->surname,
            'email' => $application->email,
        ]);

        return redirect()->route('admin.applications.index')->with('success', 'Заявка успешно создана!');
    }



    // Удаление заявки
    public function destroy(Application $application)
    {
        // Проверка разрешения на удаление заявок
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_DELETE)) {
            abort(403, 'У вас нет прав для удаления заявок');
        }

        // Логируем удаление
        $this->logDelete('Application', $application->id, [
            'name' => $application->name,
            'surname' => $application->surname,
            'email' => $application->email,
        ]);

        // Удаляем CV файл перед удалением записи
        if ($application->cv_file && file_exists(public_path($application->cv_file))) {
            unlink(public_path($application->cv_file));
        }
        $application->delete();

        return redirect()->route('admin.applications.index')->with('success', 'Заявка успешно удалена!');
    }

    // Скачивание CV файла
    public function downloadCv(Application $application)
    {
        // Проверка разрешения на просмотр заявок
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра заявок');
        }

        if (!$application->cv_file || !file_exists(public_path($application->cv_file))) {
            abort(404, 'CV файл не найден');
        }

        return response()->download(public_path($application->cv_file));
    }
}