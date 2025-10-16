<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Models\Categories;
use App\Models\CategoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Список всех категорий
    public function index()
    {
        // Проверка разрешения на просмотр категорий
        if (!Auth::user()->hasPermission(Permissions::CATEGORIES_VIEW)) {
            abort(403, 'У вас нет прав для просмотра категорий');
        }

        $categories = Categories::with('translations')->orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.categories.index', [
            'categories' => $categories,
        ]);
    }


    // Форма создания новой категории
    public function create()
    {
        // Проверка разрешения на создание категорий
        if (!Auth::user()->hasPermission(Permissions::CATEGORIES_CREATE)) {
            abort(403, 'У вас нет прав для создания категорий');
        }

        return view('admin.categories.create');
    }

    // Сохранение новой категории
    public function store(Request $request)
    {
        // Проверка разрешения на создание категорий
        if (!Auth::user()->hasPermission(Permissions::CATEGORIES_CREATE)) {
            abort(403, 'У вас нет прав для создания категорий');
        }

        try {
            $request->validate([
                'name_ru' => 'required|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.categories.create')
                ->withErrors($e->validator)
                ->withInput();
        }

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'description_ru', 'description_en', 'description_tm', 'status']);

        // Создаём категорию
        $category = Categories::create([
            'slug' => Str::slug($data['name_ru'] ?? 'category') . '-' . time(),
            'status' => $request->has('status') ? 1 : 0,
        ]);

        // Создаём переводы для всех языков
        foreach (['ru', 'en', 'tm'] as $locale) {
            CategoryTranslation::create([
                'category_id' => $category->id,
                'locale' => $locale,
                'name' => $data["name_{$locale}"] ?? '',
                'description' => $data["description_{$locale}"] ?? '',
            ]);
        }

        return redirect()->route('admin.categories.index')->with('success', 'Категория успешно создана!');
    }

    // Форма редактирования категории
    public function edit(Categories $category)
    {
        // Проверка разрешения на редактирование категорий
        if (!Auth::user()->hasPermission(Permissions::CATEGORIES_EDIT)) {
            abort(403, 'У вас нет прав для редактирования категорий');
        }

        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    // Обновление категории
    public function update(Request $request, Categories $category)
    {
        // Проверка разрешения на редактирование категорий
        if (!Auth::user()->hasPermission(Permissions::CATEGORIES_EDIT)) {
            abort(403, 'У вас нет прав для редактирования категорий');
        }

        try {
            $request->validate([
                'name_ru' => 'required|string|max:255',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.categories.edit', $category->slug)
                ->withErrors($e->validator)
                ->withInput();
        }

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'description_ru', 'description_en', 'description_tm', 'status']);

        // Обновляем slug
        $category->update([
            'slug' => Str::slug($data['name_ru']) . '-' . $category->id,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        // Обновляем переводы для всех языков
        foreach (['ru', 'en', 'tm'] as $locale) {
            $category->translations()->updateOrCreate(
                ['locale' => $locale],
                [
                    'name' => $data["name_{$locale}"] ?? '',
                    'description' => $data["description_{$locale}"] ?? '',
                ]
            );
        }

        return redirect()->route('admin.categories.index')->with('success', 'Категория успешно обновлена!');
    }

    // Удаление категории
    public function destroy(Categories $category)
    {
        // Проверка разрешения на удаление категорий
        if (!Auth::user()->hasPermission(Permissions::CATEGORIES_DELETE)) {
            abort(403, 'У вас нет прав для удаления категорий');
        }

        // Проверяем, есть ли проекты с этой категорией
        if ($category->portfolios()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Невозможно удалить категорию! Есть проекты, использующие её.');
        }

        // Проверяем, есть ли новости с этой категорией
        if ($category->news()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Невозможно удалить категорию! Есть новости, использующие её.');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Категория успешно удалена!');
    }
}
