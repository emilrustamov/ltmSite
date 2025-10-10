<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioTranslation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{

    public function index($lang)
    {
        App::setLocale($lang);

        $portfolio = Cache::remember("portfolio_{$lang}", now()->addMinutes(10), function () {
            return Portfolio::with(['categories.translations', 'translations'])->orderBy('ordering')->get();
        });

        $categories = Cache::remember("categories_{$lang}", now()->addMinutes(10), function () {
            return Categories::with('translations')->get();
        });

        return view('portfolio', [
            'portfolio' => $portfolio,
            'categories' => $categories,
            'leftMenu' => true,
            'currentPage' => '',
            'lang' => $lang,
        ]);
    }

    public function showOnePortf($lang, Portfolio $portfolio)
    {
        App::setLocale($lang);

        // Загружаем категории и переводы проекта
        $portfolio->load(['categories.translations', 'translations']);

        return view('oneProjectDetails', [
            'portfolio'   => $portfolio,
            'categories'  => $portfolio->categories,
            'leftMenu'    => true,
            'currentPage' => 'Проекты',
            'lang'        => $lang,
        ]);
    }

    public function addProject($lang)
    {
        $categories = Categories::with('translations')->get();
        return view('admin/addProject', [
            'lang' => $lang,
            'categories' => $categories,
        ]);
    }

    public function addPortfolio(Request $req, $lang)
    {
        $req->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tm' => 'required|string|max:255',
            'when' => 'nullable|date',
            'image' => 'nullable|image|max:10240',
        ]);

        $data = $req->only([
            'url_button', 'is_main_page', 'when',
            'title_tm', 'title_ru', 'title_en',
            'who_tm', 'who_ru', 'who_en',
            'desc_tm', 'desc_ru', 'desc_en',
            'target_tm', 'target_ru', 'target_en',
            'res_tm', 'res_ru', 'res_en',
            'status', 'ordering', 'what'
        ]);

        // Создаём запись портфолио (только основные поля)
        $portfolio = Portfolio::create([
            'slug' => Str::slug($data['title_en'] ?? '') . '-' . time(),
            'url_button' => $data['url_button'] ?? null,
            'is_main_page' => $data['is_main_page'] ?? false,
            'when' => $data['when'] ?? null,
            'status' => $data['status'] ?? true,
            'ordering' => $data['ordering'] ?? 0,
            'photo' => '',
        ]);

        // Создаём переводы для всех языков
        foreach (['ru', 'en', 'tm'] as $locale) {
            PortfolioTranslation::create([
                'portfolio_id' => $portfolio->id,
                'locale' => $locale,
                'title' => $data["title_{$locale}"],
                'who' => $data["who_{$locale}"] ?? null,
                'description' => $data["desc_{$locale}"] ?? null,
                'target' => $data["target_{$locale}"] ?? null,
                'result' => $data["res_{$locale}"] ?? null,
            ]);
        }

        // Если файл загружен, сохраняем его через Medialibrary
        if ($req->hasFile('image')) {
            $media = $portfolio->addMediaFromRequest('image')
                ->toMediaCollection('portfolio-images');
            $portfolio->photo = $media->getUrl();
            $portfolio->save();
        }

        // Привязываем категории
        if (isset($data['what'])) {
            $portfolio->categories()->sync($data['what']);
        }

        // Очищаем кэш
        Cache::forget("portfolio_{$lang}");

        return redirect('/' . $lang . '/admin/all-projects')->with('success', 'Проект успешно создан!');
    }

    public function editProject($lang, $id)
    {
        $portfolio = Portfolio::with(['categories.translations', 'translations'])->findOrFail($id);
        $categories = Categories::with('translations')->get();
        $selectedCategoryIds = $portfolio->categories->pluck('id')->toArray();

        return view('admin/editProjects', [
            'lang' => $lang,
            'id' => $id,
            'portfolio' => $portfolio,
            'categories' => $categories,
            'selectedCategoryIds' => $selectedCategoryIds,
        ]);
    }

    public function editPortfolio(Request $req, $lang, $id)
    {
        $req->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tm' => 'required|string|max:255',
            'when' => 'nullable|date',
            'image' => 'nullable|image|max:10240',
        ]);

        $data = $req->only([
            'url_button', 'is_main_page', 'when',
            'title_tm', 'title_ru', 'title_en',
            'who_tm', 'who_ru', 'who_en',
            'desc_tm', 'desc_ru', 'desc_en',
            'target_tm', 'target_ru', 'target_en',
            'res_tm', 'res_ru', 'res_en',
            'status', 'ordering', 'what'
        ]);

        $portfolio = Portfolio::findOrFail($id);

        // Обновляем основные данные
        $portfolio->update([
            'slug' => Str::slug($data['title_en']) . '-' . $portfolio->id,
            'url_button' => $data['url_button'] ?? null,
            'is_main_page' => $data['is_main_page'] ?? false,
            'when' => $data['when'] ?? null,
            'status' => $data['status'] ?? true,
            'ordering' => $data['ordering'] ?? 0,
        ]);

        // Обновляем переводы для всех языков
        foreach (['ru', 'en', 'tm'] as $locale) {
            $portfolio->translations()->updateOrCreate(
                ['locale' => $locale],
                [
                    'title' => $data["title_{$locale}"],
                    'who' => $data["who_{$locale}"] ?? null,
                    'description' => $data["desc_{$locale}"] ?? null,
                    'target' => $data["target_{$locale}"] ?? null,
                    'result' => $data["res_{$locale}"] ?? null,
                ]
            );
        }

        // Обновляем изображение если загружено
        if ($req->hasFile('image')) {
            $portfolio->clearMediaCollection('portfolio-images');
            $media = $portfolio->addMediaFromRequest('image')
                ->toMediaCollection('portfolio-images');
            $portfolio->photo = $media->getUrl();
            $portfolio->save();
        }

        // Обновляем категории
        if (isset($data['what'])) {
            $portfolio->categories()->sync($data['what']);
        }

        // Очищаем кэш
        Cache::forget("portfolio_{$lang}");
        Cache::forget("portfolio_{$lang}_{$portfolio->slug}");

        return redirect('/' . $lang . '/admin/all-projects')->with('success', 'Проект успешно обновлен!');
    }

    public function destroy($lang, Request $req)
    {
        $portfolio = Portfolio::findOrFail($req->id);
        $portfolio->clearMediaCollection('portfolio-images');
        $portfolio->delete();

        // Очищаем кэш
        Cache::forget("portfolio_{$lang}");

        return redirect("/{$lang}/admin/all-projects")->with('success', 'Проект успешно удален!');
    }
}
