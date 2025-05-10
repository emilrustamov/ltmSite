<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category_One_Project;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Images_Add;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;

class ProjSliderController extends Controller
{
    public function index($lang)
    {
        App::setLocale($lang);

        // Кэширование портфолио
        $portfolio = Cache::remember("portfolio_{$lang}", now()->addMinutes(10), function () {
            return Portfolio::orderBy('when', 'desc')->get();
        });

        // Проверка, что данные действительно получены
        if ($portfolio->isEmpty()) {
            dd('Нет данных в портфолио');
        }

        // Кэширование категорий
        $categories = Cache::remember("categories_{$lang}", now()->addMinutes(10), function () {
            return Categories::all();
        });

        $currentPage = "";

        return view('webpage', [
            'portfolio' => $portfolio,
            'categories' => $categories,
            'leftMenu' => false,
            'currentPage' => $currentPage,
            'lang' => $lang
        ]);
    }

    public function showOnePortf($lang, Portfolio $portfolio)
    {
        App::setLocale($lang);

        // кеш по слагу
        $portfolio = Cache::remember("portfolio_{$lang}_{$portfolio->slug}", now()->addMinutes(10), function () use ($portfolio) {
            return $portfolio;
        });

        $images_add = Cache::remember("images_add_{$portfolio->id}", now()->addMinutes(10), function () use ($portfolio) {
            return Images_Add::where('portfolio_id', $portfolio->id)->get();
        });

        // категории
        $catPortf = Category_One_Project::where('portfolio_id', $portfolio->id)->get();
        $projectCategories = [];
        foreach ($catPortf as $item) {
            if ($cat = Categories::find($item->category_id)) {
                $projectCategories[] = $cat;
            }
        }

        return view('oneProjectDetails', [
            'portfolio'  => $portfolio,
            'categories' => $projectCategories,
            'leftMenu'   => true,
            'currentPage' => 'Проекты',
            'lang'       => $lang,
            'images_add' => $images_add,
        ]);
    }
}
