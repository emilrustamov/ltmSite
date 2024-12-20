<?php

use App\Http\Controllers\ProjSliderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Models\Portfolio;
use App\Models\Images_Add;
use App\Http\Controllers\CBlog;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CPortfolio;
use App\Http\Controllers\HomeController;
use App\Models\Blog;
use App\Models\Categories;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
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

// Переадресация на /ru только для корневого маршрута
Route::get('/', function () {
    return redirect("/{lang}");
});




///mainPage
Route::get('/{lang}', [HomeController::class, 'index'])->middleware('redirect');

// Определение группы маршрутов для администраторов
Route::middleware(['admin.access'])->group(function () {
    $path = 'App\Http\Controllers';

    // Все блоги
    Route::get('/{lang}/admin/all-articles', function ($lang) {
        App::setLocale($lang);
        Paginator::useBootstrap();
        $blog = Blog::paginate(10);
        return view('allArticles', ['lang' => $lang, 'blog' => $blog]);
    });

    // Добавление блога
    Route::get('/{lang}/admin/add-article', function ($lang) {
        App::setLocale($lang);
        return view('addBlog', ['lang' => $lang]);
    });
    Route::post('/{lang}/admin/add-article', $path . '\CBlog@addBlog');

    // Редактирование блога
    Route::get('/{lang}/admin/edit-article/{id}', function ($lang, $id) {
        App::setLocale($lang);
        $blog = Blog::where('id', $id)->get();
        return view('editBlog', ['lang' => $lang, 'id' => $id, 'blog' => $blog[0]]);
    });
    Route::post('/{lang}/admin/edit-article/{id}', $path . '\CBlog@editBlog');

    // Удаление блога
    Route::delete('/{lang}/admin/delete-article/{id}', [CBlog::class, 'destroy'])->name('articles.destroy');



    // Все проекты
    Route::get('/{lang}/admin/all-projects', function ($lang) {
        App::setLocale($lang);
        Paginator::useBootstrap();
        $portfolio = Portfolio::paginate(10);
        return view('allProjects', ['lang' => $lang, 'portfolio' => $portfolio]);
    });

    // Добавление портфолио
    Route::get('/{lang}/admin/add-project', [CPortfolio::class, 'addProject']);
    Route::post('/{lang}/admin/add-project', $path . '\CPortfolio@addPortfolio');

    // Редактирование портфолио
    Route::get('/{lang}/admin/edit-project/{id}', [CPortfolio::class, 'editProject']);
    Route::post('/{lang}/admin/edit-project/{id}', $path . '\CPortfolio@editPortfolio');
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

//blog
Route::get('/{lang}/blog', function ($lang) {
    App::setLocale($lang);
    $leftMenu = true;
    $currentPage = __('translate.blog');
    $blog = Blog::offset(0)->limit(7)->get();
    return view('blog', ['blog' => $blog, 'leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang]);
})->middleware('redirect');
Route::get('/{lang}/blog/{id}', function ($lang, $id) {
    App::setLocale($lang);
    $leftMenu = true;
    $currentPage = "Блог";
    $blog = Blog::where('id', $id)->get();
    return view('oneArticleDetails', ['leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang, 'id' => $id, 'blog' => $blog[0]]);
})->middleware('redirect');

//contacts
Route::get('/{lang}/contacts', function ($lang) {
    App::setLocale($lang);
    $leftMenu = true;
    $currentPage = "";
    return view('contacts', ['leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang]);
})->middleware('redirect');
//QA
Route::get('/{lang}/faq', function ($lang) {
    App::setLocale($lang);
    $leftMenu = true;
    $currentPage = "FAQ";
    return view('faq', ['leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang]);
})->middleware('redirect');
//bitrix box
Route::get('/{lang}/services-bitrix', function ($lang) {
    App::setLocale($lang);
    $leftMenu = true;
    $currentPage = "";
    return view('bitrixbox', ['leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang]);
})->middleware('redirect');
//bitrix cloud
Route::get('/{lang}/services-bcloud', function ($lang) {
    App::setLocale($lang);
    $leftMenu = true;
    $currentPage = "";
    return view('bitrixcloud', ['leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang]);
})->middleware('redirect');
//apps
Route::get('/{lang}/services-apps', function ($lang) {
    App::setLocale($lang);
    $leftMenu = true;
    $currentPage = "";
    return view('mobileapps', ['leftMenu' => $leftMenu, 'currentPage' => $currentPage, 'lang' => $lang]);
})->middleware('redirect');



Route::post('/{lang}/admin/delete-project', $path . '\CPortfolio@destroy');
Route::post('/{lang}/ajax-portfolio', $path . '\CPortfolio@ajaxPortfolio');
Route::post('/{lang}/ajax-tmp', $path . '\CPortfolio@ajaxTmp');
Route::get('/{lang}/show-more/{pageOffset}/{type}', $path . '\CPortfolio@showMore');



Route::post('/{lang}/ajax-blog', $path . '\CPortfolio@ajaxBlog');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');


// web.php
Route::get('/{lang}/no-access', function () {
    return view('noAccess');
})->name('noaccess');
