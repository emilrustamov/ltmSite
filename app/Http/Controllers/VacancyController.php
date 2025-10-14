<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\VacancyTranslation;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VacancyController extends Controller
{
    // Список всех вакансий (админ)
    public function index()
    {
        $vacancies = Vacancy::with('translations')->orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.vacancies.index', [
            'vacancies' => $vacancies,
        ]);
    }

    // Форма создания новой вакансии
    public function create()
    {
        $categories = Categories::with('translations')->where('status', 1)->get();
        return view('admin.vacancies.create', [
            'categories' => $categories,
        ]);
    }

    // Сохранение новой вакансии
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title_ru' => 'required|string|max:255',
                'image' => 'nullable|image|max:10240',
                'salary_from' => 'nullable|numeric|min:0',
                'salary_to' => 'nullable|numeric|min:0|gte:salary_from',
                'application_deadline' => 'nullable|date|after:today',
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
            'salary_from', 'salary_to', 'application_deadline', 'status'
        ]);

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
        $categories = Categories::with('translations')->where('status', 1)->get();
        return view('admin.vacancies.edit', [
            'vacancy' => $vacancy,
            'categories' => $categories,
        ]);
    }

    // Обновление вакансии
    public function update(Request $request, Vacancy $vacancy)
    {
        try {
            $request->validate([
                'title_ru' => 'required|string|max:255',
                'image' => 'nullable|image|max:10240',
                'salary_from' => 'nullable|numeric|min:0',
                'salary_to' => 'nullable|numeric|min:0|gte:salary_from',
                'application_deadline' => 'nullable|date',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.vacancies.edit', $vacancy->slug)
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
            'salary_from', 'salary_to', 'application_deadline', 'status'
        ]);

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
        // Удаляем медиафайлы перед удалением записи
        $vacancy->clearMediaCollection('vacancy-images');
        $vacancy->delete();

        return redirect()->route('admin.vacancies.index')->with('success', 'Вакансия успешно удалена!');
    }

    // Публичный метод - показать вакансию
    public function show(Vacancy $vacancy)
    {
        if (!$vacancy->is_active) {
            abort(404);
        }

        return view('vacancy.show', [
            'vacancy' => $vacancy,
        ]);
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