<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Support\Facades\App;

class PublicPortfolioController extends Controller
{
    public function index(string $lang)
    {
        App::setLocale($lang);

        $portfolios = Portfolio::with(['translations'])
            ->where('status', true)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('portfolio', [
            'portfolio' => $portfolios,
            'lang' => $lang,
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
}
