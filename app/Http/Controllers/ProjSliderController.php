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

    public function showOnePortf($lang, $id)
    {
        App::setLocale($lang);

        // Кэширование портфолио по ID
        $portfolio = Cache::remember("portfolio_{$lang}_{$id}", now()->addMinutes(10), function () use ($id) {
            return Portfolio::where('id', $id)->get();
        });

        // Кэширование изображений
        $images_add = Cache::remember("images_add_{$id}", now()->addMinutes(10), function () use ($id) {
            return Images_Add::where('portfolio_id', $id)->get();
        });

        // Кэширование всех категорий
        $categories = Cache::remember("categories_all_{$lang}", now()->addMinutes(10), function () {
            return Categories::all();
        });

        $catPortf = Category_One_Project::where('portfolio_id', $id)->get();
        $projectCategories = [];
        foreach ($catPortf as $item) {
            $catData = Categories::where('id', $item->category_id)->get();
            if (!$catData->isEmpty()) {
                $projectCategories[] = $catData;
            }
        }

        return view('oneProjectDetails', [
            'portfolio' => $portfolio[0],
            'categories' => $projectCategories,
            'leftMenu' => true,
            'currentPage' => 'Проекты',
            'lang' => $lang,
            'id' => $id,
            'images_add' => $images_add,
        ]);
    }
}
