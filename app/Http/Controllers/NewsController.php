<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    // Публичные методы для фронтенда
    public function index($lang)
    {
        App::setLocale($lang);

        $news = Cache::remember("news_{$lang}", now()->addMinutes(10), function () {
            return News::where('status', true)
                ->orderBy('published_at', 'desc')
                ->paginate(12);
        });

        return view('news.index', [
            'news' => $news,
            'leftMenu' => true,
            'lang' => $lang,
        ]);
    }

    public function show($lang, News $news)
    {
        App::setLocale($lang);

        return view('news.show', [
            'news' => $news,
            'leftMenu' => true,
            'lang' => $lang,
        ]);
    }

    // Админ методы
    public function adminIndex($lang)
    {
        $news = News::orderBy('published_at', 'desc')->paginate(20);
        return view('admin.news.index', [
            'lang' => $lang,
            'news' => $news,
        ]);
    }

    public function create($lang)
    {
        return view('admin.news.create', [
            'lang' => $lang,
        ]);
    }

    public function store(Request $req, $lang)
    {
        $req->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tm' => 'required|string|max:255',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|max:10240',
        ]);

        $data = $req->only([
            'title_ru', 'title_en', 'title_tm',
            'content_ru', 'content_en', 'content_tm',
            'excerpt_ru', 'excerpt_en', 'excerpt_tm',
            'status', 'published_at'
        ]);

        $news = News::create([
            'slug' => Str::slug($data['title_en']) . '-' . time(),
            'title_ru' => $data['title_ru'],
            'title_en' => $data['title_en'],
            'title_tm' => $data['title_tm'],
            'content_ru' => $data['content_ru'] ?? null,
            'content_en' => $data['content_en'] ?? null,
            'content_tm' => $data['content_tm'] ?? null,
            'excerpt_ru' => $data['excerpt_ru'] ?? null,
            'excerpt_en' => $data['excerpt_en'] ?? null,
            'excerpt_tm' => $data['excerpt_tm'] ?? null,
            'status' => $data['status'] ?? true,
            'published_at' => $data['published_at'] ?? now(),
        ]);

        // Загрузка изображения
        if ($req->hasFile('image')) {
            $path = $req->file('image')->store('news', 'public');
            $news->image = $path;
            $news->save();
        }

        Cache::forget("news_{$lang}");

        return redirect("/{$lang}/admin/news")->with('success', 'Новость успешно создана!');
    }

    public function edit($lang, $id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', [
            'lang' => $lang,
            'news' => $news,
        ]);
    }

    public function update(Request $req, $lang, $id)
    {
        $req->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tm' => 'required|string|max:255',
            'published_at' => 'nullable|date',
            'image' => 'nullable|image|max:10240',
        ]);

        $news = News::findOrFail($id);

        $data = $req->only([
            'title_ru', 'title_en', 'title_tm',
            'content_ru', 'content_en', 'content_tm',
            'excerpt_ru', 'excerpt_en', 'excerpt_tm',
            'status', 'published_at'
        ]);

        $news->update([
            'slug' => Str::slug($data['title_en']) . '-' . $news->id,
            'title_ru' => $data['title_ru'],
            'title_en' => $data['title_en'],
            'title_tm' => $data['title_tm'],
            'content_ru' => $data['content_ru'] ?? null,
            'content_en' => $data['content_en'] ?? null,
            'content_tm' => $data['content_tm'] ?? null,
            'excerpt_ru' => $data['excerpt_ru'] ?? null,
            'excerpt_en' => $data['excerpt_en'] ?? null,
            'excerpt_tm' => $data['excerpt_tm'] ?? null,
            'status' => $data['status'] ?? true,
            'published_at' => $data['published_at'] ?? $news->published_at,
        ]);

        // Обновление изображения
        if ($req->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $path = $req->file('image')->store('news', 'public');
            $news->image = $path;
            $news->save();
        }

        Cache::forget("news_{$lang}");

        return redirect("/{$lang}/admin/news")->with('success', 'Новость успешно обновлена!');
    }

    public function destroy($lang, Request $req)
    {
        $news = News::findOrFail($req->id);
        
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        
        $news->delete();

        Cache::forget("news_{$lang}");

        return redirect("/{$lang}/admin/news")->with('success', 'Новость успешно удалена!');
    }
}

