<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Models\Vacancy;
use App\Models\VacancyTranslation;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VacancyController extends Controller
{
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

        $categories = Categories::with('translations')->where('status', 1)->get();
        return view('admin.vacancies.create', [
            'categories' => $categories,
        ]);
    }

    // Сохранение новой вакансии
    public function store(Request $request)
    {
        // Проверка разрешения на создание вакансий
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_CREATE)) {
            abort(403, 'У вас нет прав для создания вакансий');
        }

        try {
            $request->validate([
                'title_ru' => 'required|string|max:255',
                'salary_from' => 'nullable|numeric|min:0',
                'salary_to' => 'nullable|numeric|min:0|gte:salary_from',
                'source' => 'required|string',
                'custom_source' => 'nullable|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.vacancies.create')
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
            'salary_from', 'salary_to', 'status', 'source', 'custom_source'
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

        // Связываем вакансию с категориями (если понадобится)
        if ($request->has('categories')) {
            $vacancy->categories()->sync($request->categories);
        }

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
            'salary_from', 'salary_to', 'status', 'source', 'custom_source'
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

        // Обновляем связи с категориями
        if ($request->has('categories')) {
            $vacancy->categories()->sync($request->categories);
        } else {
            $vacancy->categories()->detach();
        }

        return redirect()->route('admin.vacancies.index')->with('success', 'Вакансия успешно обновлена!');
    }

    // Удаление вакансии
    public function destroy(Vacancy $vacancy)
    {
        // Проверка разрешения на удаление вакансий
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_DELETE)) {
            abort(403, 'У вас нет прав для удаления вакансий');
        }

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