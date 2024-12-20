<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index($lang)
    {
        App::setLocale($lang);
        $leftMenu = false;
        $currentPage = "Главная";

        $projects = Portfolio::where('isMainPage', 1)->get();
        // var_dump($projects);
        // console.log($projects);
        // dd($projects);
        return view('mainPage', ['leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang, 'projects'=>$projects]);
    }
}
