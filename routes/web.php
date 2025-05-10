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

Route::get('/api/portfolio-count/{lang}', [CPortfolio::class, 'getPortfolioCount']);
Route::get('/', fn() => redirect('/ru')); // Корень -> /ru по умолчанию

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
        Route::get('/services-webpages/{portfolio}', [ProjSliderController::class, 'showOnePortf'])
            ->name('services.webpage');

        // About Us
        Route::get('/about_us', function ($lang) {
            App::setLocale($lang);
            $leftMenu = true;
            $currentPage = '';
            return view('about_us', compact('leftMenu', 'currentPage', 'lang'));
        })->name('about_us');

        // Portfolio
        Route::get('/portfolio', [CPortfolio::class, 'index'])
            ->name('portfolio.index');
        Route::get('/portfolio/{portfolio}', [CPortfolio::class, 'showOnePortf'])
            ->name('portfolio.show');

        // Contacts
        Route::get('/contacts', function ($lang) {
            App::setLocale($lang);
            $leftMenu = true;
            $currentPage = '';
            return view('contacts', compact('leftMenu', 'currentPage', 'lang'));
        })->name('contacts');

        // No Access page
        Route::get('/no-access', fn() => view('noAccess'))
            ->name('noaccess');

        // -----------------------------------
        // Admin routes (подгруппа)
        // -----------------------------------
        Route::middleware('admin.access')
            ->name('admin.')
            ->group(function () {

                Route::get('/admin/all-projects', fn($lang) => Paginator::useTailwind() ?: view('admin.allProjects', ['lang' => $lang, 'portfolio' => Portfolio::paginate(30)]))
                    ->name('all_projects');
                Route::get('/admin/add-project', [CPortfolio::class, 'addProject'])
                    ->name('add_project.form');
                Route::post('/admin/add-project', [CPortfolio::class, 'addPortfolio'])
                    ->name('add_project.submit');
                Route::get('/admin/edit-project/{id}', [CPortfolio::class, 'editProject'])
                    ->name('edit_project.form');
                Route::post('/admin/edit-project/{id}', [CPortfolio::class, 'editPortfolio'])
                    ->name('edit_project.submit');
                Route::delete('/admin/destroy/{id}', [CPortfolio::class, 'destroy'])
                    ->name('destroy_project');
            });
    });

// ---------------------------------------
// Contact form (no lang prefix)
// ---------------------------------------
Route::get('/contact', [ContactController::class, 'showForm'])
    ->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])
    ->name('contact.submit');
