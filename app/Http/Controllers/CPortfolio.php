<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category_One_Project;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use App\Services\PortfolioService;

class CPortfolio extends Controller
{
    protected $portfolioService;

    public function __construct(PortfolioService $portfolioService)
    {
        $this->portfolioService = $portfolioService;
    }


    public function index($lang)
    {
        App::setLocale($lang);

        $portfolio = Cache::remember("portfolio_{$lang}", now()->addMinutes(10), function () {
            return $this->portfolioService->getPortfolioList();
        });

        $categories = Cache::remember("categories_{$lang}", now()->addMinutes(10), function () {
            return Categories::all();
        });

        return view('portfolio', [
            'portfolio' => $portfolio,
            'categories' => $categories,
            'leftMenu' => true,
            'currentPage' => '',
            'lang' => $lang,
        ]);
    }

    public function showOnePortf($lang, $id)
    {
        App::setLocale($lang);

        $portfolio = Cache::remember("portfolio_{$lang}_{$id}", now()->addMinutes(10), function () use ($id) {
            return Portfolio::findOrFail($id);
        });

        $categories = $this->portfolioService->getCategoriesForProject($id);

        return view('oneProjectDetails', [
            'portfolio' => $portfolio,
            'categories' => $categories,
            'leftMenu' => true,
            'currentPage' => 'Проекты',
            'lang' => $lang,
            'id' => $id,
        ]);
    }

    public function addProject($lang)
    {
        $categories = Categories::all();
        return view('admin/addProject', [
            'lang' => $lang,
            'categories' => $categories,
        ]);
    }

    public function addPortfolio(Request $req, $lang)
    {
        $data = $req->only([
            'urlButton',
            'isMainPage',
            'when',
            'title_tm',
            'title_ru',
            'title_en',
            'who_tm',
            'who_ru',
            'who_en',
            'desc_tm',
            'desc_ru',
            'desc_en',
            'target_tm',
            'target_ru',
            'target_en',
            'res_tm',
            'res_ru',
            'res_en',
            'status',
            'ordering'
        ]);

        // Создаём запись портфолио без фото
        $portfolio = new Portfolio;
        $portfolio->urlButton  = $data['urlButton'];
        $portfolio->isMainPage = $data['isMainPage'] ?? 0;
        $portfolio->when       = $data['when'];
        $portfolio->title      = [
            'tm' => $data['title_tm'],
            'ru' => $data['title_ru'],
            'en' => $data['title_en'],
        ];
        $portfolio->who        = [
            'tm' => $data['who_tm'],
            'ru' => $data['who_ru'],
            'en' => $data['who_en'],
        ];
        $portfolio->description = [
            'tm' => $data['desc_tm'],
            'ru' => $data['desc_ru'],
            'en' => $data['desc_en'],
        ];
        $portfolio->target     = [
            'tm' => $data['target_tm'],
            'ru' => $data['target_ru'],
            'en' => $data['target_en'],
        ];
        $portfolio->result     = [
            'tm' => $data['res_tm'],
            'ru' => $data['res_ru'],
            'en' => $data['res_en'],
        ];
        $portfolio->status     = $data['status'] ?? true;
        $portfolio->ordering   = $data['ordering'] ?? 0;
        $portfolio->save();

        // Если файл загружен, сохраняем его через Medialibrary
        if ($req->hasFile('image')) {
            $portfolio->addMediaFromRequest('image')
                ->toMediaCollection('portfolio-images');
        }

        return redirect('/' . $lang . '/admin/all-projects');
    }


    public function editProject($lang, $id)
    {
        $portfolio = Portfolio::with('categories')->findOrFail($id);
        $categories = Categories::all();
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
        $data = $req->only([
            'urlButton',
            'isMainPage',
            'when',
            'title_tm',
            'title_ru',
            'title_en',
            'who_tm',
            'who_ru',
            'who_en',
            'desc_tm',
            'desc_ru',
            'desc_en',
            'target_tm',
            'target_ru',
            'target_en',
            'res_tm',
            'res_ru',
            'res_en',
            'what',
            'deleteImages',
            'status',
            'ordering'
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->urlButton  = $data['urlButton'];
        $portfolio->isMainPage = $data['isMainPage'];
        $portfolio->when       = $data['when'];

        // Если загружен новый файл, добавляем его в Medialibrary
        if ($req->hasFile('image')) {
            // При необходимости можно удалить старые медиа-файлы
            $portfolio->clearMediaCollection('portfolio-images');

            $portfolio->addMediaFromRequest('image')
                ->toMediaCollection('portfolio-images');
        }

        $portfolio->title = [
            'tm' => $data['title_tm'],
            'ru' => $data['title_ru'],
            'en' => $data['title_en'],
        ];
        $portfolio->who = [
            'tm' => $data['who_tm'],
            'ru' => $data['who_ru'],
            'en' => $data['who_en'],
        ];
        $portfolio->description = [
            'tm' => $data['desc_tm'],
            'ru' => $data['desc_ru'],
            'en' => $data['desc_en'],
        ];
        $portfolio->target = [
            'tm' => $data['target_tm'],
            'ru' => $data['target_ru'],
            'en' => $data['target_en'],
        ];
        $portfolio->result = [
            'tm' => $data['res_tm'],
            'ru' => $data['res_ru'],
            'en' => $data['res_en'],
        ];
        $portfolio->status   = $data['status'];
        $portfolio->ordering = $data['ordering'];

        if (isset($data['what'])) {
            $portfolio->categories()->sync($data['what']);
        }

        $portfolio->save();

        return redirect('/' . $lang . '/admin/all-projects');
    }


    public function destroy($lang, Request $req)
    {
        $this->portfolioService->deletePortfolio($req->id);
        // Redirect after deletion instead of returning JSON response.
        return redirect("/{$lang}/admin/all-projects")->with('message', 'Portfolio deleted successfully.');
    }



    public function ajaxTmp(Request $req, string $lang)
    {
        return response()->json([]);
    }
}
