<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PublicPortfolioController extends Controller
{
    public function index(string $lang, Request $request)
    {
        App::setLocale($lang);

        $selectedCategories = collect((array) $request->input('categories'))
            ->filter(fn ($id) => is_numeric($id))
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values()
            ->all();

        $categories = Categories::with(['translations' => function ($query) use ($lang) {
                $query->where('locale', $lang);
            }])
            ->where('status', true)
            ->orderBy('id')
            ->get();

        $portfolios = $this->buildPortfolioQuery($selectedCategories)
            ->paginate(12)
            ->withQueryString();

        return view('portfolio', [
            'portfolios' => $portfolios,
            'categories' => $categories,
            'selectedCategories' => $selectedCategories,
            'lang' => $lang,
        ]);
    }

    public function filter(string $lang, Request $request)
    {
        App::setLocale($lang);

        if (! $request->ajax()) {
            return redirect()->route('lang.portfolio.index', ['lang' => $lang]);
        }

        $selectedCategories = collect((array) $request->input('categories'))
            ->filter(fn ($id) => is_numeric($id))
            ->map(fn ($id) => (int) $id)
            ->unique()
            ->values()
            ->all();

        $portfolios = $this->buildPortfolioQuery($selectedCategories)
            ->paginate(12);

        $gridHtml = view('portfolio.partials.grid', [
            'portfolios' => $portfolios,
            'lang' => $lang,
        ])->render();

        $paginationHtml = view('portfolio.partials.pagination', [
            'portfolios' => $portfolios,
        ])->render();

        return response()->json([
            'grid' => $gridHtml,
            'pagination' => $paginationHtml,
            'meta' => [
                'total' => $portfolios->total(),
                'page' => $portfolios->currentPage(),
                'per_page' => $portfolios->perPage(),
            ],
        ]);
    }

    public function show(string $lang, Portfolio $portfolio)
    {
        App::setLocale($lang);
        $portfolio->load(['translations', 'categories.translations']);

        return view('oneProjectDetails', [
            'portfolio' => $portfolio,
            'categories' => $portfolio->categories,
            'lang' => $lang,
        ]);
    }

    protected function buildPortfolioQuery(array $categoryIds = [])
    {
        $query = Portfolio::with(['translations'])
            ->where('status', true)
            ->orderBy('created_at', 'desc');

        if (! empty($categoryIds)) {
            $query->whereHas('categories', function ($relation) use ($categoryIds) {
                $relation->whereIn('categories.id', $categoryIds);
            });
        }

        return $query;
    }
}
