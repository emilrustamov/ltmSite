<?php

namespace App\Services\Portfolio;

use App\Models\Categories;
use App\Models\Portfolio;
use Illuminate\Support\Collection;

class BitrixProjectsService
{
    /**
     * @return Collection<int, Portfolio>
     */
    public function getProjects(): Collection
    {
        $bitrixCategory = Categories::query()
            ->where(function ($query) {
                $query->whereIn('slug', ['bitrix', 'bitrix24']);
            })
            ->where('status', true)
            ->first();

        if (!$bitrixCategory) {
            $bitrixCategory = Categories::query()
                ->whereHas('translations', function ($query) {
                    $query->where('name', 'LIKE', '%bitrix%')
                        ->orWhere('name', 'LIKE', '%Битрикс%');
                })
                ->where('status', true)
                ->first();
        }

        if (!$bitrixCategory) {
            return collect();
        }

        return Portfolio::query()
            ->with(['translations', 'categories.translations'])
            ->where('status', true)
            ->whereHas('categories', function ($relation) use ($bitrixCategory) {
                $relation->where('categories.id', $bitrixCategory->id);
            })
            ->orderBy('ordering')
            ->orderByDesc('created_at')
            ->get();
    }
}
