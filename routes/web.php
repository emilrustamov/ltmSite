<?php

use App\Http\Controllers\ProjSliderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Models\Portfolio;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CPortfolio;
use App\Http\Controllers\HomeController;
use Illuminate\Pagination\Paginator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

$path = 'App\Http\Controllers';
require __DIR__ . '/auth.php';


//sitemap
Route::get('/sitemap.xml', function () {

    $languages = ['ru', 'en', 'tm']; // Укажите языки вашего сайта

    $sitemap = Sitemap::create();

    foreach ($languages as $lang) {
        // Добавляем главные страницы для каждого языка
        $sitemap->add(Url::create("/{$lang}")
            ->setPriority(1.0)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setLastModificationDate(now()));

        // Добавляем страницы портфолио для каждого языка
        $portfolios = Portfolio::all();
        foreach ($portfolios as $portfolio) {
            $sitemap->add(Url::create("/{$lang}/portfolio/{$portfolio->id}")
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setLastModificationDate($portfolio->updated_at));
        }

        // Статические страницы
        $staticPages = [
            ['url' => '/services', 'priority' => 0.9, 'changeFreq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/about_us', 'priority' => 0.7, 'changeFreq' => Url::CHANGE_FREQUENCY_YEARLY],
            ['url' => '/contacts', 'priority' => 0.7, 'changeFreq' => Url::CHANGE_FREQUENCY_YEARLY],
            ['url' => '/faq', 'priority' => 0.6, 'changeFreq' => Url::CHANGE_FREQUENCY_YEARLY],
            ['url' => '/services-bitrix', 'priority' => 0.8, 'changeFreq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['url' => '/services-bcloud', 'priority' => 0.8, 'changeFreq' => Url::CHANGE_FREQUENCY_MONTHLY],
        ];

        foreach ($staticPages as $page) {
            $sitemap->add(Url::create("/{$lang}{$page['url']}")
                ->setPriority($page['priority'])
                ->setChangeFrequency($page['changeFreq'])
                ->setLastModificationDate(now()));
        }
    }

    // Возвращаем карту сайта
    return $sitemap->toResponse(request());
});

Route::get('/api/portfolio-count/{lang}', [\App\Http\Controllers\CPortfolio::class, 'getPortfolioCount']);
// Переадресация на /ru только для корневого маршрута
Route::get('/', function () {
    return redirect("/{lang}");
});


Route::get('/{lang}/bitrix24', function ($lang) {
    App::setLocale($lang);
    return view('bitrix', ['lang' => $lang]);
})->middleware('redirect');

///mainPage
Route::get('/{lang}', [HomeController::class, 'index'])->middleware('redirect');

// Определение группы маршрутов для администраторов
Route::middleware(['admin.access'])->group(function () {
    $path = 'App\Http\Controllers';

    // Все проекты
    Route::get('/{lang}/admin/all-projects', function ($lang) {
        App::setLocale($lang);
        Paginator::useTailwind();
        $portfolio = Portfolio::paginate(30);
        return view('admin.allProjects', ['lang' => $lang, 'portfolio' => $portfolio]);
    });

    // Добавление портфолио
    Route::get('/{lang}/admin/add-project', [CPortfolio::class, 'addProject']);
    Route::post('/{lang}/admin/add-project', $path . '\CPortfolio@addPortfolio');

    // Редактирование портфолио
    Route::get('/{lang}/admin/edit-project/{id}', [CPortfolio::class, 'editProject']);
    Route::post('/{lang}/admin/edit-project/{id}', $path . '\CPortfolio@editPortfolio');

    // Удаление портфолио
    Route::delete('/{lang}/admin/destroy/{id}', [CPortfolio::class, 'destroy']);
});


//services
Route::get('/{lang}/services', function ($lang) {
    App::setLocale($lang);
    $leftMenu = true;
    $currentPage = "";
    return view('services', ['leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang]);
})->middleware('redirect');


Route::get('/{lang}/services-webpages', [ProjSliderController::class, 'index'])->middleware('redirect');



//about-us
Route::get('/{lang}/about_us', function ($lang) {
    App::setLocale($lang);
    $leftMenu = true;
    $currentPage = ""; //"О нас";
    return view('about_us', ['leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang]);
})->middleware('redirect');

//portfolio
Route::get('/{lang}/portfolio', [CPortfolio::class, 'index'])->middleware('redirect');
Route::get('/{lang}/portfolio/{id}', [CPortfolio::class, 'showOnePortf'])->middleware('redirect');



//contacts
Route::get('/{lang}/contacts', function ($lang) {
    App::setLocale($lang);
    $leftMenu = true;
    $currentPage = "";
    return view('contacts', ['leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang]);
})->middleware('redirect');




Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');


// web.php
Route::get('/{lang}/no-access', function () {
    return view('noAccess');
})->name('noaccess');
