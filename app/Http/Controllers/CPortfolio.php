<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Category_One_Project;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Images_Add;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;



// use App\Models\Images_Add;


class CPortfolio extends Controller
{

    public function index($lang)
    {
        App::setLocale($lang);
        $portfolio = Cache::remember("portfolio_{$lang}", now()->addMinutes(10), function () {
            \Log::info('Данные портфолио загружаются из базы данных');
            return Portfolio::orderBy('when', 'desc')
                ->offset(0)
                ->limit(6)
                ->get();
        });

        $categories = Cache::remember("categories_{$lang}", now()->addMinutes(10), function () {
            return Categories::all();
        });

        $currentPage = "";
        return view('portfolio', [
            'portfolio' => $portfolio,
            'categories' => $categories,
            'leftMenu' => true,
            'currentPage' => $currentPage,
            'lang' => $lang
        ]);
    }

    public function showOnePortf($lang, $id)
    {
        App::setLocale($lang);

        $portfolio = Cache::remember("portfolio_{$lang}_{$id}", now()->addMinutes(10), function () use ($id) {
            return Portfolio::where('id', $id)->get();
        });

        $images_add = Cache::remember("images_add_{$id}", now()->addMinutes(10), function () use ($id) {
            return Images_Add::where('portfolio_id', $id)->get();
        });

        $categories = Cache::remember("categories_all", now()->addMinutes(10), function () {
            return Categories::all();
        });

        $catPortf = Category_One_Project::where('portfolio_id', $id)->get();
        $categories = [];
        foreach ($catPortf as $item) {
            $catData = Categories::where('id', $item->category_id)->get();
            if (!$catData->isEmpty()) {
                $categories[] = $catData;
            }
        }

        return view('oneProjectDetails', [
            'portfolio' => $portfolio[0],
            'categories' => $categories,
            'leftMenu' => true,
            'currentPage' => 'Проекты',
            'lang' => $lang,
            'id' => $id,
            'images_add' => $images_add,
            'categories' => $categories,
        ]);
    }

    public function addProject($lang)
    {
        $categories = Categories::all();
        return view('addProject', [
            'lang' => $lang,
            'categories' => $categories,
            'what_was_done_ru' => '',
            'what_was_done_tm' => '',
            'what_was_done_en' => '',
        ]);
    }


    public function addPortfolio(Request $req, $lang)
    {
        $portfolio = new Portfolio;
        $portfolio->urlButton = $req->urlButton;
        $portfolio->customer = $req->customer;
        $portfolio->curator = $req->curator ?? null;
        $portfolio->devNames = $req->devNames;
        $portfolio->isMainPage = $req->isMainPage ?? 0;

        // Обработка главного изображения
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $filename = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $webpPath = 'portfolio-image/' . $filename . '.webp';

            try {
                $imageResized = Image::make($image)->encode('webp', 90);
                Storage::disk('public')->put($webpPath, $imageResized);
                $portfolio->photo = $webpPath;
            } catch (\Exception $e) {
                \Log::error('Ошибка загрузки главного изображения: ' . $e->getMessage());
            }
        }

        $portfolio->when = $req->when;
        $portfolio->title_tm = $req->title_tm;
        $portfolio->who_tm = $req->who_tm;
        $portfolio->desc_tm = $req->desc_tm;
        $portfolio->target_tm = $req->target_tm;
        $portfolio->res_tm = $req->res_tm;
        $portfolio->what_was_done_tm = $req->what_was_done_tm;
        $portfolio->title_ru = $req->title_ru;
        $portfolio->who_ru = $req->who_ru;
        $portfolio->desc_ru = $req->desc_ru;
        $portfolio->target_ru = $req->target_ru;
        $portfolio->res_ru = $req->res_ru;
        $portfolio->what_was_done_ru = $req->what_was_done_ru;
        $portfolio->title_en = $req->title_en;
        $portfolio->who_en = $req->who_en;
        $portfolio->desc_en = $req->desc_en;
        $portfolio->target_en = $req->target_en;
        $portfolio->res_en = $req->res_en;
        $portfolio->what_was_done_en = $req->what_was_done_en;

        $portfolio->save();

        // Сохранение дополнительных изображений
        if ($req->hasFile('imagess')) {
            foreach ($req->file('imagess') as $img) {
                $filename = time() . '_' . pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
                $webpPath = 'portfolio-image/' . $filename . '.webp';

                try {
                    $imageResized = Image::make($img)->encode('webp', 90);
                    Storage::disk('public')->put($webpPath, $imageResized);

                    $images_portf = new Images_Add;
                    $images_portf->portfolio_id = $portfolio->id;
                    $images_portf->image_portf = $webpPath;
                    $images_portf->save();
                } catch (\Exception $e) {
                    \Log::error('Ошибка загрузки дополнительного изображения: ' . $e->getMessage());
                }
            }
        }

        return redirect('/' . $lang . '/admin/all-projects');
    }



    public function categories()
    {
        return $this->belongsToMany(Categories::class);
    }
    public function editProject($lang, $id)
    {
        // $portfolio = Portfolio::where('id', $id)->get();
        $images_add = Images_Add::where('portfolio_id', $id)->get();
        $categories = Categories::all();
        $portfolio = Portfolio::with('categories')->find($id);
        $selectedCategoryIds = $portfolio->categories->pluck('id')->toArray();  // Get current category IDs
        return view('editProjects', [
            'lang' => $lang,
            'id' => $id,
            'portfolio' => $portfolio,
            'what_was_done_ru' => $portfolio->what_was_done_ru,
            'what_was_done_tm' => $portfolio->what_was_done_tm,
            'what_was_done_en' => $portfolio->what_was_done_en,
            'images_add' => $images_add,
            'categories' => $categories,
            'selectedCategoryIds' => $selectedCategoryIds
        ]);
    }
    public function editPortfolio(Request $req, $lang, $id)
    {
        $portfolio = Portfolio::find($id);

        // Проверяем, найден ли проект
        if (!$portfolio) {
            dd('Проект с указанным ID не найден');
        }

        $portfolio->urlButton = $req->urlButton;
        $portfolio->customer = $req->customer;
        $portfolio->curator = $req->curator ?? null;
        $portfolio->devNames = $req->devNames;
        $portfolio->isMainPage = $req->isMainPage;

        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $filename = time() . '_' . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $webpPath = 'portfolio-image/' . $filename . '.webp';

            try {
                $imageResized = Image::make($image)->encode('webp', 90);
                Storage::disk('public')->put($webpPath, $imageResized);
                $portfolio->photo = $webpPath;
            } catch (\Exception $e) {
                dd('Ошибка загрузки главного изображения: ' . $e->getMessage());
            }
        }

        $portfolio->when = $req->when;
        $portfolio->title_tm = $req->title_tm;
        $portfolio->who_tm = $req->who_tm;
        $portfolio->desc_tm = $req->desc_tm;
        $portfolio->target_tm = $req->target_tm;
        $portfolio->res_tm = $req->res_tm;
        $portfolio->what_was_done_tm = $req->what_was_done_tm;
        $portfolio->title_ru = $req->title_ru;
        $portfolio->who_ru = $req->who_ru;
        $portfolio->desc_ru = $req->desc_ru;
        $portfolio->target_ru = $req->target_ru;
        $portfolio->res_ru = $req->res_ru;
        $portfolio->what_was_done_ru = $req->what_was_done_ru;
        $portfolio->title_en = $req->title_en;
        $portfolio->who_en = $req->who_en;
        $portfolio->desc_en = $req->desc_en;
        $portfolio->target_en = $req->target_en;
        $portfolio->res_en = $req->res_en;
        $portfolio->what_was_done_en = $req->what_was_done_en;

        if ($req->has('what')) {
            $portfolio->categories()->sync($req->what);
        }

        // Проверяем, передаются ли файлы
        if (!$req->hasFile('imagess')) {
            dd('Файлы не переданы для редактирования');
        }

        // Проверяем содержимое файлов
        $files = $req->file('imagess');
        if (empty($files)) {
            dd('Массив файлов пуст');
        }

        foreach ($files as $key => $img) {
            $filename = time() . '_' . pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
            $webpPath = 'portfolio-image/' . $filename . '.webp';

            try {
                $imageResized = Image::make($img)->encode('webp', 90);
                Storage::disk('public')->put($webpPath, $imageResized);

                $images_portf = new Images_Add;
                $images_portf->portfolio_id = $portfolio->id;
                $images_portf->image_portf = $webpPath;

                if (!$images_portf->save()) {
                    dd('Ошибка сохранения в базе данных для файла: ' . $webpPath);
                }
            } catch (\Exception $e) {
                dd('Ошибка обработки изображения: ' . $e->getMessage());
            }
        }

        if ($req->has('deleteImages')) {
            foreach ($req->deleteImages as $imageId) {
                $image = Images_Add::find($imageId);
                if ($image) {
                    Storage::disk('public')->delete($image->image_portf);
                    $image->delete();
                }
            }
        }

        $portfolio->save();
        return redirect('/' . $lang . '/admin/all-projects');
        
    }


    public function destroy($lang, Request $req)
    {
        $project = Portfolio::find($req->id);
        if ($project) {
            Category_One_Project::where('portfolio_id', $project->id)->delete();
            $project->delete();
            return true;
        } else {
            return false;
        }
    }
    public function ajaxPortfolio(Request $req)
    {
        $cacheKey = "ajax_portfolio_{$req->category}";

        $portfolio = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($req) {
            $baseQuery = Portfolio::query()
                ->join('category_portfolio', 'portfolio.id', '=', 'category_portfolio.portfolio_id')
                ->join('categories', 'category_portfolio.category_id', '=', 'categories.id')
                ->select('portfolio.*', 'categories.category_en as category_name');

            if ($req->category == "All") {
                return $baseQuery->orderBy('portfolio.when', 'desc')
                    ->limit(6)
                    ->get();
            } else {
                return $baseQuery->where('categories.category_en', '=', $req->category)
                    ->orderBy('portfolio.when', 'desc')
                    ->limit(6)
                    ->get();
            }
        });

        return response()->json($portfolio);
    }



    public function ajaxTmp(Request $req, string $lang)
    {
        // echo $req->file('imagess');
        $image_desc = array();
        $images = $req->file('imagess');
        foreach ($images as $img) {
            $img->store('tmp');
            array_push($image_desc, $img->store('tmp'));
        }
        $json = json_encode($image_desc);
        echo $json;
    }

    public function showMore(string $lang, $pageOffset, $type)
    {
        $limit = 3;
        $baseQuery = Portfolio::query()
            ->join('category_portfolio', 'portfolio.id', '=', 'category_portfolio.portfolio_id')
            ->join('categories', 'category_portfolio.category_id', '=', 'categories.id')
            ->select('portfolio.*', 'categories.category_en as category_name');

        if ($type != 'All') {
            $portfolio = $baseQuery->where('categories.category_en', '=', $type)
                ->orderBy('when', 'desc')
                ->offset($pageOffset)
                ->limit($limit + 1) // +1 для проверки, есть ли ещё данные
                ->get();
        } else {
            $portfolio = Portfolio::orderBy('when', 'desc')
                ->offset($pageOffset)
                ->limit($limit + 1) // +1 для проверки, есть ли ещё данные
                ->get();
        }

        $hasMore = $portfolio->count() > $limit;
        $portfolio = $portfolio->take($limit); // Берём только первые 3

        return response()->json(['data' => $portfolio, 'hasMore' => $hasMore]);
    }
}
