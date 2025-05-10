<?php

namespace App\Services;

use App\Models\Portfolio;
use App\Models\Categories;
use App\Models\Category_One_Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioService
{

    public function getPortfolioList()
    {
        // Changed ordering field and removed limit/offset to return all records
        return Portfolio::where('status', true)
        ->orderBy('ordering', 'asc')
        ->get();
    }


    public function getCategoriesForProject($projectId)
    {
        $catPortf = Category_One_Project::where('portfolio_id', $projectId)->get();
        $categories = [];
        foreach ($catPortf as $item) {
            $catData = Categories::where('id', $item->category_id)->get();
            if (!$catData->isEmpty()) {
                $categories[] = $catData;
            }
        }
        return $categories;
    }


    public function createPortfolio($data)
    {
        $portfolio = new Portfolio;
        $portfolio->urlButton = $data['urlButton'];
        $portfolio->isMainPage = $data['isMainPage'] ?? 0;
        $portfolio->when = $data['when'];
        $portfolio->photo = $data['photo']; 
        
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
        $portfolio->slug = Str::slug($data['title_en']);
        $portfolio->status = $data['status'] ?? true;
        $portfolio->ordering = $data['ordering'] ?? 0;
        $portfolio->save();
    }


    public function updatePortfolio($id, $data)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->urlButton = $data['urlButton'];
        $portfolio->isMainPage = $data['isMainPage'];
        $portfolio->when = $data['when'];

        // Обновляем photo, если оно передано
        if (isset($data['photo'])) {
            $portfolio->photo = $data['photo'];
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
        // New fields update:
        $portfolio->slug = Str::slug($data['title_en']);
        $portfolio->status = $data['status'];
        $portfolio->ordering = $data['ordering'];

        if (isset($data['what'])) {
            $portfolio->categories()->sync($data['what']);
        }

        $portfolio->save();
    }


    public function deletePortfolio($id)
    {
        $project = Portfolio::findOrFail($id);
        Category_One_Project::where('portfolio_id', $project->id)->delete();
        $project->delete();
    }


}
