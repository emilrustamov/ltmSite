<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\PortfolioTranslation;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{

    public function index()
    {
        // Проверка разрешения на просмотр портфолио
        if (!Auth::user()->hasPermission(Permissions::PORTFOLIO_VIEW)) {
            abort(403, 'У вас нет прав для просмотра портфолио');
        }

        $portfolios = Portfolio::with(['categories.translations', 'translations'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        
        return view('admin.portfolios.index', [
            'portfolios' => $portfolios,
        ]);
    }


    public function create()
    {
        // Проверка разрешения на создание портфолио
        if (!Auth::user()->hasPermission(Permissions::PORTFOLIO_CREATE)) {
            abort(403, 'У вас нет прав для создания портфолио');
        }

        $categories = Categories::with('translations')->get();
        
        return view('admin.portfolios.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        // Проверка разрешения на создание портфолио
        if (!Auth::user()->hasPermission(Permissions::PORTFOLIO_CREATE)) {
            abort(403, 'У вас нет прав для создания портфолио');
        }

        try {
            $request->validate([
                'title_ru' => 'required|string|max:255',
                'when' => 'nullable|date',
                'image' => 'nullable|image|max:10240',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Если валидация не прошла, возвращаемся на страницу создания с ошибками
            return redirect()->route('admin.portfolios.create')
                ->withErrors($e->validator)
                ->withInput();
        }

        $data = $request->only([
            'url_button', 'is_main_page', 'when',
            'title_tm', 'title_ru', 'title_en',
            'who_tm', 'who_ru', 'who_en',
            'desc_tm', 'desc_ru', 'desc_en',
            'target_tm', 'target_ru', 'target_en',
            'res_tm', 'res_ru', 'res_en',
            'status', 'ordering', 'categories'
        ]);

        // Создаём запись портфолио
        $portfolio = Portfolio::create([
            'slug' => Str::slug($data['title_ru'] ?? '') . '-' . time(),
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
                'title' => $data["title_{$locale}"] ?? '',
                'who' => $data["who_{$locale}"] ?? null,
                'description' => $data["desc_{$locale}"] ?? null,
                'target' => $data["target_{$locale}"] ?? null,
                'result' => $data["res_{$locale}"] ?? null,
            ]);
        }

        // Привязываем категории
        if (!empty($data['categories'])) {
            $portfolio->categories()->sync($data['categories']);
        }

        // Обработка изображения
        if ($request->hasFile('image')) {
            $portfolio->addMediaFromRequest('image')
                ->toMediaCollection('portfolio-images');
        }

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Портфолио успешно создано!');
    }

    public function edit(Portfolio $portfolio)
    {
        // Проверка разрешения на редактирование портфолио
        if (!Auth::user()->hasPermission(Permissions::PORTFOLIO_EDIT)) {
            abort(403, 'У вас нет прав для редактирования портфолио');
        }

        $categories = Categories::with('translations')->get();
        $portfolio->load(['categories', 'translations']);
        
        return view('admin.portfolios.edit', [
            'portfolio' => $portfolio,
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        // Проверка разрешения на редактирование портфолио
        if (!Auth::user()->hasPermission(Permissions::PORTFOLIO_EDIT)) {
            abort(403, 'У вас нет прав для редактирования портфолио');
        }

        try {
            $request->validate([
                'title_ru' => 'required|string|max:255',
                'when' => 'nullable|date',
                'image' => 'nullable|image|max:10240',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.portfolios.edit', $portfolio->slug)
                ->withErrors($e->validator)
                ->withInput();
        }

        $data = $request->only([
            'url_button', 'is_main_page', 'when',
            'title_tm', 'title_ru', 'title_en',
            'who_tm', 'who_ru', 'who_en',
            'desc_tm', 'desc_ru', 'desc_en',
            'target_tm', 'target_ru', 'target_en',
            'res_tm', 'res_ru', 'res_en',
            'status', 'ordering', 'categories'
        ]);

        // Обновляем основную запись
        $portfolio->update([
            'url_button' => $data['url_button'] ?? null,
            'is_main_page' => $data['is_main_page'] ?? false,
            'when' => $data['when'] ?? null,
            'status' => $data['status'] ?? true,
            'ordering' => $data['ordering'] ?? 0,
        ]);

        // Обновляем переводы
        foreach (['ru', 'en', 'tm'] as $locale) {
            $translation = $portfolio->translations()->where('locale', $locale)->first();
            if ($translation) {
                $translation->update([
                    'title' => $data["title_{$locale}"] ?? '',
                    'who' => $data["who_{$locale}"] ?? null,
                    'description' => $data["desc_{$locale}"] ?? null,
                    'target' => $data["target_{$locale}"] ?? null,
                    'result' => $data["res_{$locale}"] ?? null,
                ]);
            } else {
                PortfolioTranslation::create([
                    'portfolio_id' => $portfolio->id,
                    'locale' => $locale,
                    'title' => $data["title_{$locale}"] ?? '',
                    'who' => $data["who_{$locale}"] ?? null,
                    'description' => $data["desc_{$locale}"] ?? null,
                    'target' => $data["target_{$locale}"] ?? null,
                    'result' => $data["res_{$locale}"] ?? null,
                ]);
            }
        }

        // Обновляем категории
        if (!empty($data['categories'])) {
            $portfolio->categories()->sync($data['categories']);
        }

        // Обработка нового изображения
        if ($request->hasFile('image')) {
            $portfolio->clearMediaCollection('portfolio-images');
            $portfolio->addMediaFromRequest('image')
                ->toMediaCollection('portfolio-images');
        }

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Портфолио успешно обновлено!');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Проверка разрешения на удаление портфолио
        if (!Auth::user()->hasPermission(Permissions::PORTFOLIO_DELETE)) {
            abort(403, 'У вас нет прав для удаления портфолио');
        }

        $portfolio->clearMediaCollection('portfolio-images');
        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
            ->with('success', 'Портфолио успешно удалено!');
    }

    public function getPortfolioCount($lang)
    {
        $total = Portfolio::count();
        return response()->json(['total' => $total]);
    }
}
