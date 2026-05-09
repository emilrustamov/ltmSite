<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index($lang)
    {
        App::setLocale($lang);
        $leftMenu = false;
        $currentPage = 'Главная';

        $projects = Portfolio::query()
            ->with('translations')
            ->where('is_main_page', 1)
            ->where('status', 1)
            ->orderBy('ordering')
            ->get();

        return view('mainPage', [
            'leftMenu' => $leftMenu,
            'currentPage' => $currentPage,
            'lang' => $lang,
            'projects' => $projects,
        ]);
    }
}
