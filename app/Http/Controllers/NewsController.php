<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Models\News;
use App\Models\NewsTranslation;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    // Админ методы - resourceful
    public function index()
    {
        // Проверяем права на просмотр новостей
        if (!Auth::user()->hasPermission(Permissions::NEWS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра новостей');
        }

        $news = News::with('categories.translations')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.news.index', [
            'news' => $news,
        ]);
    }


    public function create()
    {
        // Проверяем права на создание новостей
        if (!Auth::user()->hasPermission(Permissions::NEWS_CREATE)) {
            abort(403, 'У вас нет прав для создания новостей');
        }

        $categories = Categories::with('translations')->where('status', 1)->get();
        return view('admin.news.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title_ru' => 'required|string|max:255',
                'image' => 'nullable|image|max:10240',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.news.create')
                ->withErrors($e->validator)
                ->withInput();
        }

        $data = $request->only([
            'title_ru', 'title_en', 'title_tm',
            'content_ru', 'content_en', 'content_tm',
            'status'
        ]);

        // Создаём новость
        $news = News::create([
            'slug' => Str::slug($data['title_ru']) . '-' . time(),
            'status' => $request->has('status') ? 1 : 0,
        ]);

        // Создаём переводы для всех языков
        foreach (['ru', 'en', 'tm'] as $locale) {
            NewsTranslation::create([
                'news_id' => $news->id,
                'locale' => $locale,
                'title' => $data["title_{$locale}"] ?? '',
                'content' => $data["content_{$locale}"] ?? '',
            ]);
        }

        // Загрузка изображения через Spatie Media Library
        if ($request->hasFile('image')) {
            $news->addMediaFromRequest('image')
                 ->toMediaCollection('news-images');
        }

        // Связываем новость с категориями
        if ($request->has('categories')) {
            $news->categories()->sync($request->categories);
        }

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно создана!');
    }

    public function edit(News $news)
    {
        $categories = Categories::with('translations')->where('status', 1)->get();
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, News $news)
    {
        try {
            $request->validate([
                'title_ru' => 'required|string|max:255',
                'image' => 'nullable|image|max:10240',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.news.edit', $news->slug)
                ->withErrors($e->validator)
                ->withInput();
        }

        $data = $request->only([
            'title_ru', 'title_en', 'title_tm',
            'content_ru', 'content_en', 'content_tm',
            'status'
        ]);

        // Обновляем основные поля
        $news->update([
            'slug' => Str::slug($data['title_ru']) . '-' . $news->id,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        // Обновляем переводы для всех языков
        foreach (['ru', 'en', 'tm'] as $locale) {
            $news->translations()->updateOrCreate(
                ['locale' => $locale],
                [
                    'title' => $data["title_{$locale}"] ?? '',
                    'content' => $data["content_{$locale}"] ?? '',
                ]
            );
        }

        // Обновление изображения
        if ($request->hasFile('image')) {
            $news->clearMediaCollection('news-images');
            $news->addMediaFromRequest('image')
                 ->toMediaCollection('news-images');
        }

        // Обновляем связи с категориями
        if ($request->has('categories')) {
            $news->categories()->sync($request->categories);
        } else {
            $news->categories()->detach();
        }

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно обновлена!');
    }

    public function destroy(News $news)
    {
        // Удаляем медиафайлы перед удалением записи
        $news->clearMediaCollection('news-images');
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена!');
    }
}

