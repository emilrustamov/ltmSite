<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Models\Vacancy;
use App\Models\VacancyTranslation;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Traits\LogsUserActivity;

class VacancyController extends Controller
{
    use LogsUserActivity;
    // Список всех вакансий (админ)
    public function index()
    {
        // Проверка разрешения на просмотр вакансий
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_VIEW)) {
            abort(403, 'У вас нет прав для просмотра вакансий');
        }

        $vacancies = Vacancy::with('translations')->orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.vacancies.index', [
            'vacancies' => $vacancies,
        ]);
    }

    // Форма создания новой вакансии
    public function create()
    {
        // Проверка разрешения на создание вакансий
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_CREATE)) {
            abort(403, 'У вас нет прав для создания вакансий');
        }

        return view('admin.vacancies.create');
    }

    // Сохранение новой вакансии
    public function store(Request $request)
    {
        // Проверка разрешения на создание вакансий
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_CREATE)) {
            abort(403, 'У вас нет прав для создания вакансий');
        }

        $validated = $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'title_tm' => 'nullable|string|max:255',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_tm' => 'nullable|string',
            'requirements_ru' => 'nullable|string',
            'requirements_en' => 'nullable|string',
            'requirements_tm' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'employment_type' => 'nullable|in:full-time,part-time,contract,freelance,internship',
            'experience_level' => 'nullable|in:intern,junior,middle,senior,lead',
            'salary_from' => 'nullable|numeric|min:0',
            'salary_to' => 'nullable|numeric|min:0|gte:salary_from',
            'image' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif,webp',
            'status' => 'boolean',
            'is_featured' => 'boolean',
        ], [
            'title_ru.required' => 'Название на русском языке обязательно',
            'title_ru.max' => 'Название не должно превышать 255 символов',
            'salary_from.numeric' => 'Зарплата должна быть числом',
            'salary_from.min' => 'Зарплата не может быть отрицательной',
            'salary_to.numeric' => 'Зарплата должна быть числом',
            'salary_to.min' => 'Зарплата не может быть отрицательной',
            'salary_to.gte' => 'Максимальная зарплата должна быть больше или равна минимальной',
            'image.image' => 'Файл должен быть изображением',
            'image.max' => 'Размер изображения не должен превышать 10MB',
            'image.mimes' => 'Поддерживаются только форматы: jpeg, png, jpg, gif, webp',
        ]);

        $data = $request->only([
            'title_ru', 'title_en', 'title_tm',
            'description_ru', 'description_en', 'description_tm',
            'requirements_ru', 'requirements_en', 'requirements_tm',
            'responsibilities_ru', 'responsibilities_en', 'responsibilities_tm',
            'benefits_ru', 'benefits_en', 'benefits_tm',
            'company_name_ru', 'company_name_en', 'company_name_tm',
            'company_description_ru', 'company_description_en', 'company_description_tm',
            'location', 'employment_type', 'experience_level',
            'salary_from', 'salary_to', 'status', 'source', 'custom_source',
            'city_id', 'custom_city', 'job_positions', 'technical_skills', 
            'languages', 'work_formats'
        ]);

        // Определяем источник информации
        $source = $data['source'] ?? null;
        if ($source === 'other') {
            $source = $data['custom_source'] ?? null;
        }

        // Создаём вакансию
        $vacancy = Vacancy::create([
            'slug' => Str::slug($data['title_ru']) . '-' . time(),
            'status' => $request->has('status') ? 1 : 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'location' => $data['location'] ?? null,
            'employment_type' => $data['employment_type'] ?? null,
            'experience_level' => $data['experience_level'] ?? null,
            'salary_from' => $data['salary_from'] ?? null,
            'salary_to' => $data['salary_to'] ?? null,
            'application_deadline' => $data['application_deadline'] ?? null,
            'published_at' => $request->has('status') ? now() : null,
            'custom_source' => $source,
        ]);

        // Создаём переводы для всех языков
        foreach (['ru', 'en', 'tm'] as $locale) {
            VacancyTranslation::create([
                'vacancy_id' => $vacancy->id,
                'locale' => $locale,
                'title' => $data["title_{$locale}"] ?? '',
                'description' => $data["description_{$locale}"] ?? '',
                'requirements' => $data["requirements_{$locale}"] ?? '',
                'responsibilities' => $data["responsibilities_{$locale}"] ?? '',
                'benefits' => $data["benefits_{$locale}"] ?? '',
                'company_name' => $data["company_name_{$locale}"] ?? '',
                'company_description' => $data["company_description_{$locale}"] ?? '',
            ]);
        }

        // Загрузка изображения через Spatie Media Library
        if ($request->hasFile('image')) {
            $vacancy->addMediaFromRequest('image')
                 ->toMediaCollection('vacancy-images');
        }


        // Связываем с должностями
        if (!empty($data['job_positions'])) {
            $vacancy->jobPositions()->sync($data['job_positions']);
        } else {
            $vacancy->jobPositions()->detach();
        }

        // Связываем с техническими навыками
        if (!empty($data['technical_skills'])) {
            $vacancy->technicalSkills()->sync($data['technical_skills']);
        } else {
            $vacancy->technicalSkills()->detach();
        }

        // Связываем с языками
        if (!empty($data['languages'])) {
            $vacancy->languages()->sync($data['languages']);
        } else {
            $vacancy->languages()->detach();
        }

        // Связываем с форматами работы
        if (!empty($data['work_formats'])) {
            $vacancy->workFormats()->sync($data['work_formats']);
        } else {
            $vacancy->workFormats()->detach();
        }


        // Логируем создание
        $this->logCreate('Vacancy', $vacancy->id, [
            'title' => $vacancy->translation('ru')?->title,
            'slug' => $vacancy->slug,
        ]);

        return redirect()->route('admin.vacancies.index')->with('success', 'Вакансия успешно создана!');
    }

    // Форма редактирования вакансии
    public function edit(Vacancy $vacancy)
    {
        // Проверка разрешения на редактирование вакансий
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_EDIT)) {
            abort(403, 'У вас нет прав для редактирования вакансий');
        }

        $categories = Categories::with('translations')->where('status', 1)->get();
        return view('admin.vacancies.edit', [
            'vacancy' => $vacancy,
            'categories' => $categories,
        ]);
    }

    // Обновление вакансии
    public function update(Request $request, Vacancy $vacancy)
    {
        // Проверка разрешения на редактирование вакансий
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_EDIT)) {
            abort(403, 'У вас нет прав для редактирования вакансий');
        }

        try {
            $request->validate([
                'title_ru' => 'required|string|max:255',
                'image' => 'nullable|image|max:10240',
                'salary_from' => 'nullable|numeric|min:0',
                'salary_to' => 'nullable|numeric|min:0|gte:salary_from',
                'application_deadline' => 'nullable|date',
                'source' => 'required|string',
                'custom_source' => 'nullable|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.vacancies.edit', $vacancy)
                ->withErrors($e->validator)
                ->withInput();
        }

        $data = $request->only([
            'title_ru', 'title_en', 'title_tm',
            'description_ru', 'description_en', 'description_tm',
            'requirements_ru', 'requirements_en', 'requirements_tm',
            'responsibilities_ru', 'responsibilities_en', 'responsibilities_tm',
            'benefits_ru', 'benefits_en', 'benefits_tm',
            'company_name_ru', 'company_name_en', 'company_name_tm',
            'company_description_ru', 'company_description_en', 'company_description_tm',
            'location', 'employment_type', 'experience_level',
            'salary_from', 'salary_to', 'status', 'source', 'custom_source',
            'city_id', 'custom_city', 'job_positions', 'technical_skills', 
            'languages', 'work_formats'
        ]);

        // Определяем источник информации
        $source = $data['source'] ?? null;
        if ($source === 'other') {
            $source = $data['custom_source'] ?? null;
        }

        // Обновляем основные поля
        $vacancy->update([
            'slug' => Str::slug($data['title_ru']) . '-' . $vacancy->id,
            'status' => $request->has('status') ? 1 : 0,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
            'location' => $data['location'] ?? null,
            'employment_type' => $data['employment_type'] ?? null,
            'experience_level' => $data['experience_level'] ?? null,
            'salary_from' => $data['salary_from'] ?? null,
            'salary_to' => $data['salary_to'] ?? null,
            'application_deadline' => $data['application_deadline'] ?? null,
            'published_at' => $request->has('status') && !$vacancy->published_at ? now() : $vacancy->published_at,
            'custom_source' => $source,
        ]);

        // Обновляем переводы для всех языков
        foreach (['ru', 'en', 'tm'] as $locale) {
            $vacancy->translations()->updateOrCreate(
                ['locale' => $locale],
                [
                    'title' => $data["title_{$locale}"] ?? '',
                    'description' => $data["description_{$locale}"] ?? '',
                    'requirements' => $data["requirements_{$locale}"] ?? '',
                    'responsibilities' => $data["responsibilities_{$locale}"] ?? '',
                    'benefits' => $data["benefits_{$locale}"] ?? '',
                    'company_name' => $data["company_name_{$locale}"] ?? '',
                    'company_description' => $data["company_description_{$locale}"] ?? '',
                ]
            );
        }

        // Обновление изображения
        if ($request->hasFile('image')) {
            $vacancy->clearMediaCollection('vacancy-images');
            $vacancy->addMediaFromRequest('image')
                 ->toMediaCollection('vacancy-images');
        }


        // Логируем обновление
        $this->logUpdate('Vacancy', $vacancy->id, [], [
            'title' => $vacancy->translation('ru')?->title,
            'slug' => $vacancy->slug,
        ]);

        return redirect()->route('admin.vacancies.index')->with('success', 'Вакансия успешно обновлена!');
    }

    // Удаление вакансии
    public function destroy(Vacancy $vacancy)
    {
        // Проверка разрешения на удаление вакансий
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_DELETE)) {
            abort(403, 'У вас нет прав для удаления вакансий');
        }

        // Логируем удаление
        $this->logDelete('Vacancy', $vacancy->id, [
            'title' => $vacancy->translation('ru')?->title,
            'slug' => $vacancy->slug,
        ]);

        // Удаляем медиафайлы перед удалением записи
        $vacancy->clearMediaCollection('vacancy-images');
        $vacancy->delete();

        return redirect()->route('admin.vacancies.index')->with('success', 'Вакансия успешно удалена!');
    }


    // Публичный метод - список вакансий
    public function publicIndex()
    {
        $vacancies = Vacancy::with('translations')
            ->active()
            ->published()
            ->orderBy('is_featured', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('vacancy.index', [
            'vacancies' => $vacancies,
        ]);
    }
}