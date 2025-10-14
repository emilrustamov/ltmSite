<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Models\Portfolio;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PublicPortfolioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use Illuminate\Pagination\Paginator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;


$path = 'App\Http\Controllers';
require __DIR__ . '/auth.php';

// ---------------------------------------
// Global routes: sitemap, API, root redirect
// ---------------------------------------
Route::get('/sitemap.xml', function () {
    $langs = ['ru', 'en', 'tm'];
    $sitemap = Sitemap::create();

    // 1. Главная страниц
    foreach ($langs as $l) {
        $url = Url::create("/{$l}/")
            ->setPriority(1.0)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setLastModificationDate(now());
        // добавляем hreflang
        foreach ($langs as $alt) {
            $url->addAlternate($alt, "https://ltm.studio/{$alt}/");
        }
        $sitemap->add($url);
    }

    // 2. Список портфолио
    foreach ($langs as $l) {
        $url = Url::create("/{$l}/portfolio/")
            ->setPriority(0.9)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setLastModificationDate(now());
        foreach ($langs as $alt) {
            $url->addAlternate($alt, "https://ltm.studio/{$alt}/portfolio/");
        }
        $sitemap->add($url);
    }

    // 3. Отдельные проекты
    Portfolio::all()->each(function ($item) use ($sitemap, $langs) {
        $slug = $item->slug;
        $url = Url::create("/ru/portfolio/{$slug}")
            ->setPriority(0.8)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            ->setLastModificationDate($item->updated_at);
        foreach ($langs as $alt) {
            $url->addAlternate($alt, "https://ltm.studio/{$alt}/portfolio/{$slug}");
        }
        $sitemap->add($url);
    });

    // 4. Статические страницы
    $static = [
        '/services'  => [0.8, Url::CHANGE_FREQUENCY_MONTHLY],
        '/bitrix24'  => [0.7, Url::CHANGE_FREQUENCY_MONTHLY],
        '/about_us'  => [0.6, Url::CHANGE_FREQUENCY_YEARLY],
        '/contacts'  => [0.5, Url::CHANGE_FREQUENCY_YEARLY],
    ];

    foreach ($static as $path => [$prio, $freq]) {
        foreach ($langs as $l) {
            $url = Url::create("/{$l}{$path}")
                ->setPriority($prio)
                ->setChangeFrequency($freq)
                ->setLastModificationDate(now());
            foreach ($langs as $alt) {
                $url->addAlternate($alt, "https://ltm.studio/{$alt}{$path}");
            }
            $sitemap->add($url);
        }
    }

    return $sitemap->toResponse(request());
});

Route::get('/api/portfolio-count/{lang}', [PortfolioController::class, 'getPortfolioCount']);
Route::get('/', fn() => redirect('/ru')); // Корень -> /ru по умолчанию


// ---------------------------------------
// Admin routes (MUST be before lang routes!)
// ---------------------------------------
Route::middleware([])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        
        Route::get('/', function () {
            return redirect()->route('admin.portfolios.index');
        })->name('dashboard');
        
        Route::resource('portfolios', PortfolioController::class);
        
        Route::resource('categories', CategoryController::class);
        
        Route::resource('news', NewsController::class)->except(['show']);
        
        Route::resource('users', UserController::class);
        
        Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);
    });

Route::get('/contact', [ContactController::class, 'showForm'])
    ->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])
    ->name('contact.submit');

// ---------------------------------------
// Lang-prefixed routes (public)
// ---------------------------------------
Route::prefix('{lang}')
    ->name('lang.')
    ->middleware('redirect')
    ->group(function () {

        // Home
        Route::get('/', [HomeController::class, 'index'])
            ->name('home');

        // Bitrix24
        Route::get('/bitrix24', function ($lang) {
            App::setLocale($lang);
            return view('bitrix', compact('lang'));
        })
            ->name('bitrix');

        // Services
        Route::get('/services', function ($lang) {
            App::setLocale($lang);
            $leftMenu = true;
            $currentPage = '';
            return view('services', compact('leftMenu', 'currentPage', 'lang'));
        })->name('services');

        // About Us
        Route::get('/about_us', function ($lang) {
            App::setLocale($lang);
            $leftMenu = true;
            $currentPage = '';
            return view('about_us', compact('leftMenu', 'currentPage', 'lang'));
        })->name('about_us');

        Route::get('/portfolio/{id}', function($lang, $id){
            $item = \App\Models\Portfolio::find($id);
            if (! $item) {
                abort(404);
            }
            return redirect()->route('lang.portfolio.show', [
                'lang'      => $lang,
                'portfolio' => $item->slug,
            ], 301);
        })
        ->where('id', '[0-9]+')
        ->name('portfolio.redirect');

        // Portfolio (public)
        Route::get('/portfolio', [PublicPortfolioController::class, 'index'])
            ->name('portfolio.index');
        Route::get('/portfolio/{portfolio}', [PublicPortfolioController::class, 'show'])
            ->name('portfolio.show');

        // Contacts
        Route::get('/contacts', function ($lang) {
            App::setLocale($lang);
            $leftMenu = true;
            $currentPage = '';
            return view('contacts', compact('leftMenu', 'currentPage', 'lang'));
        })->name('contacts');

    });
