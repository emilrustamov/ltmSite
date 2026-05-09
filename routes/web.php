<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PublicPortfolioController;
use App\Http\Controllers\PublicApplicationController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobPositionController as PublicJobPositionController;


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

Route::get('/sitemap.xml', SitemapController::class);

Route::get('/api/portfolio-count/{lang}', [PortfolioController::class, 'getPortfolioCount']);
Route::get('/', fn() => redirect('/ru', 301));


Route::get('/contact', [ContactController::class, 'showForm'])
    ->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])
    ->name('contact.submit')
    ->middleware(['throttle:3,1']);

Route::prefix('{lang}')
    ->name('lang.')
    ->middleware('redirect')
    ->group(function () {
        Route::get('/', [HomeController::class, 'index'])
            ->name('home');

        Route::get('/bitrix24', [PageController::class, 'bitrix'])->name('bitrix');
        Route::get('/services', [PageController::class, 'services'])->name('services');
        Route::get('/about_us', [PageController::class, 'aboutUs'])->name('about_us');
        Route::get('/teltonika', [PageController::class, 'teltonika'])->name('teltonika');
        Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
        Route::get('/portfolio/{id}', [PageController::class, 'redirectPortfolio'])
            ->where('id', '[0-9]+')
            ->name('portfolio.redirect');

        Route::get('/portfolio', [PublicPortfolioController::class, 'index'])
            ->name('portfolio.index');
        Route::get('/portfolio/filter', [PublicPortfolioController::class, 'filter'])
            ->name('portfolio.filter');
        Route::get('/portfolio/{portfolio}', [PublicPortfolioController::class, 'show'])
            ->name('portfolio.show');

        Route::get('/jobs', [PublicJobPositionController::class, 'all'])
            ->name('jobs.index');
        Route::get('/jobs/{jobPosition}', [PublicJobPositionController::class, 'show'])
            ->name('jobs.show');
    });

Route::get('/applications/create', [PublicApplicationController::class, 'create'])->name('applications.create');
Route::post('/applications', [PublicApplicationController::class, 'store'])
    ->name('applications.store')
    ->middleware(['throttle:1,1']);

Route::post('/api/positions/skills', [PublicApplicationController::class, 'getSkillsByPositions'])
    ->name('api.positions.skills')
    ->middleware(['throttle:30,1']);
