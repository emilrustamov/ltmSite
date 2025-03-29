<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category_One_Project;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Images_Add;
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

        $images_add = Cache::remember("images_add_{$id}", now()->addMinutes(10), function () use ($id) {
            return Images_Add::where('portfolio_id', $id)->get();
        });

        $categories = $this->portfolioService->getCategoriesForProject($id);

        return view('oneProjectDetails', [
            'portfolio' => $portfolio,
            'categories' => $categories,
            'leftMenu' => true,
            'currentPage' => 'Проекты',
            'lang' => $lang,
            'id' => $id,
            'images_add' => $images_add,
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
            'urlButton', 'isMainPage', 'when',
            'title_tm', 'title_ru', 'title_en',
            'who_tm', 'who_ru', 'who_en',
            'desc_tm', 'desc_ru', 'desc_en',
            'target_tm', 'target_ru', 'target_en',
            'res_tm', 'res_ru', 'res_en',
        ]);
    
        // Обработка загруженного файла
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('portfolio-image', $imageName); 
            $data['photo'] = 'portfolio-image/' . $imageName; // Сохраняем путь к файлу
        } else {
            $data['photo'] = null; // Если файл не загружен, устанавливаем photo в null
        }
    
        $this->portfolioService->createPortfolio($data);
    
        return redirect('/' . $lang . '/admin/all-projects');
    }

    public function editProject($lang, $id)
    {
        $portfolio = Portfolio::with('categories')->findOrFail($id);
        $images_add = Images_Add::where('portfolio_id', $id)->get();
        $categories = Categories::all();
        $selectedCategoryIds = $portfolio->categories->pluck('id')->toArray();

        return view('admin/editProjects', [
            'lang' => $lang,
            'id' => $id,
            'portfolio' => $portfolio,
            'images_add' => $images_add,
            'categories' => $categories,
            'selectedCategoryIds' => $selectedCategoryIds,
        ]);
    }

    public function editPortfolio(Request $req, $lang, $id)
    {
        $data = $req->only([
            'urlButton', 'isMainPage', 'when',
            'title_tm', 'title_ru', 'title_en',
            'who_tm', 'who_ru', 'who_en',
            'desc_tm', 'desc_ru', 'desc_en',
            'target_tm', 'target_ru', 'target_en',
            'res_tm', 'res_ru', 'res_en',
            'what', 'deleteImages',
        ]);
    
        // Обработка загруженного файла
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('portfolio-image', $imageName); 
            $data['photo'] = 'portfolio-image/' . $imageName; 
        
            // Удаляем старое изображение, если оно существует
            $portfolio = Portfolio::findOrFail($id);
            if ($portfolio->photo) {
                Storage::delete('public/' . $portfolio->photo);
            }
        }
    
        $this->portfolioService->updatePortfolio($id, $data);
    
        return redirect('/' . $lang . '/admin/all-projects');
    }

    public function destroy($lang, Request $req)
    {
        $this->portfolioService->deletePortfolio($req->id);
        return response()->json(['success' => true]);
    }

    public function ajaxPortfolio(Request $req)
    {
        $portfolio = $this->portfolioService->getPortfolioForAjax($req->category);
        return response()->json($portfolio);
    }

    public function ajaxTmp(Request $req, string $lang)
    {
        return response()->json([]);
    }

    public function showMore(string $lang, $pageOffset, $type)
    {
        $result = $this->portfolioService->getMoreProjects($pageOffset, $type);
        return response()->json($result);
    }
}