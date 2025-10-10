<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\CategoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Список всех категорий
    public function index($lang)
    {
        $categories = Categories::with('translations')->orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.categories.index', [
            'lang' => $lang,
            'categories' => $categories,
        ]);
    }

    // Форма создания новой категории
    public function create($lang)
    {
        return view('admin.categories.create', [
            'lang' => $lang,
        ]);
    }

    // Сохранение новой категории
    public function store(Request $req, $lang)
    {
        $req->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_tm' => 'required|string|max:255',
        ]);

        $data = $req->only(['name_ru', 'name_en', 'name_tm']);

        // Создаём категорию
        $category = Categories::create([
            'slug' => Str::slug($data['name_en']) . '-' . time(),
        ]);

        // Создаём переводы для всех языков
        foreach (['ru', 'en', 'tm'] as $locale) {
            CategoryTranslation::create([
                'category_id' => $category->id,
                'locale' => $locale,
                'name' => $data["name_{$locale}"],
            ]);
        }

        // Очищаем кэш
        Cache::forget("categories_{$lang}");

        return redirect("/{$lang}/admin/categories")->with('success', 'Категория успешно создана!');
    }

    // Форма редактирования категории
    public function edit($lang, $id)
    {
        $category = Categories::with('translations')->findOrFail($id);
        
        return view('admin.categories.edit', [
            'lang' => $lang,
            'category' => $category,
        ]);
    }

    // Обновление категории
    public function update(Request $req, $lang, $id)
    {
        $req->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'name_tm' => 'required|string|max:255',
        ]);

        $category = Categories::findOrFail($id);
        $data = $req->only(['name_ru', 'name_en', 'name_tm']);

        // Обновляем slug
        $category->update([
            'slug' => Str::slug($data['name_en']) . '-' . $category->id,
        ]);

        // Обновляем переводы для всех языков
        foreach (['ru', 'en', 'tm'] as $locale) {
            $category->translations()->updateOrCreate(
                ['locale' => $locale],
                ['name' => $data["name_{$locale}"]]
            );
        }

        // Очищаем кэш
        Cache::forget("categories_{$lang}");

        return redirect("/{$lang}/admin/categories")->with('success', 'Категория успешно обновлена!');
    }

    // Удаление категории
    public function destroy($lang, Request $req)
    {
        $category = Categories::findOrFail($req->id);
        
        // Проверяем, есть ли проекты с этой категорией
        if ($category->portfolios()->count() > 0) {
            return redirect("/{$lang}/admin/categories")
                ->with('error', 'Невозможно удалить категорию! Есть проекты, использующие её.');
        }

        $category->delete();

        // Очищаем кэш
        Cache::forget("categories_{$lang}");

        return redirect("/{$lang}/admin/categories")->with('success', 'Категория успешно удалена!');
    }
}
