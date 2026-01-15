<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Models\Portfolio;
use App\Models\Categories;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PublicPortfolioController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PublicApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\JobPositionController;
use App\Http\Controllers\JobPositionController as PublicJobPositionController;
use App\Http\Controllers\Admin\TechnicalSkillController;
use App\Http\Controllers\Admin\WorkFormatController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\CityController;
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
Route::middleware(['auth', 'admin', 'throttle:60,1'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        
        Route::get('/', function () {
            return redirect()->route('admin.portfolios.index');
        })->name('dashboard');
        
        // Портфолио - требует права portfolio.view для просмотра
        Route::middleware(['permission:portfolio.view'])->group(function () {
            Route::get('/portfolios', [PortfolioController::class, 'index'])->name('portfolios.index');
        });
        
        // Портфолио - требует права portfolio.create для создания
        Route::middleware(['permission:portfolio.create'])->group(function () {
            Route::get('/portfolios/create', [PortfolioController::class, 'create'])->name('portfolios.create');
            Route::post('/portfolios', [PortfolioController::class, 'store'])->name('portfolios.store');
        });
        
        // Портфолио - требует права portfolio.edit для редактирования
        Route::middleware(['permission:portfolio.edit'])->group(function () {
            Route::get('/portfolios/{portfolio}/edit', [PortfolioController::class, 'edit'])->name('portfolios.edit');
            Route::put('/portfolios/{portfolio}', [PortfolioController::class, 'update'])->name('portfolios.update');
        });
        
        // Портфолио - требует права portfolio.delete для удаления
        Route::middleware(['permission:portfolio.delete'])->group(function () {
            Route::delete('/portfolios/{portfolio}', [PortfolioController::class, 'destroy'])->name('portfolios.destroy');
        });
        
        // Категории - требует права categories.view для просмотра
        Route::middleware(['permission:categories.view'])->group(function () {
            Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
        });
        
        // Категории - требует права categories.create для создания
        Route::middleware(['permission:categories.create'])->group(function () {
            Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        });
        
        // Категории - требует права categories.edit для редактирования
        Route::middleware(['permission:categories.edit'])->group(function () {
            Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        });
        
        // Категории - требует права categories.delete для удаления
        Route::middleware(['permission:categories.delete'])->group(function () {
            Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        });
        
        // Новости - требует права news.view для просмотра
        Route::middleware(['permission:news.view'])->group(function () {
            Route::get('/news', [NewsController::class, 'index'])->name('news.index');
        });
        
        // Новости - требует права news.create для создания
        Route::middleware(['permission:news.create'])->group(function () {
            Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
            Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        });
        
        // Новости - требует права news.edit для редактирования
        Route::middleware(['permission:news.edit'])->group(function () {
            Route::get('/news/{news}/edit', [NewsController::class, 'edit'])->name('news.edit');
            Route::put('/news/{news}', [NewsController::class, 'update'])->name('news.update');
        });
        
        // Новости - требует права news.delete для удаления
        Route::middleware(['permission:news.delete'])->group(function () {
            Route::delete('/news/{news}', [NewsController::class, 'destroy'])->name('news.destroy');
        });
        
        // Заявки кандидатов - требует права applications.view для просмотра
        Route::middleware(['permission:applications.view'])->group(function () {
            Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
            Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
        });
        
        
        
        // Заявки кандидатов - требует права applications.delete для удаления
        Route::middleware(['permission:applications.delete'])->group(function () {
            Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
        });
        
        // Заявки кандидатов - скачивание CV файла
        Route::middleware(['permission:applications.view'])->group(function () {
            Route::get('/applications/{application}/download-cv', [ApplicationController::class, 'downloadCv'])->name('applications.download-cv');
        });
        
        // Пользователи - требует права users.view для просмотра
        Route::middleware(['permission:users.view'])->group(function () {
            Route::get('/users', [UserController::class, 'index'])->name('users.index');
        });
        
        // Пользователи - требует права users.create для создания
        Route::middleware(['permission:users.create'])->group(function () {
            Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('/users', [UserController::class, 'store'])->name('users.store');
        });
        
        // Пользователи - требует права users.edit для редактирования
        Route::middleware(['permission:users.edit'])->group(function () {
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        });
        
        // Пользователи - требует права users.delete для удаления
        Route::middleware(['permission:users.delete'])->group(function () {
            Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        });
        
        // Маршруты для управления правами пользователей - требует права users.permissions
        Route::middleware(['permission:users.permissions'])->group(function () {
            Route::get('/users/{user}/permissions/edit', [UserPermissionController::class, 'edit'])
                ->name('users.permissions.edit');
            Route::put('/users/{user}/permissions', [UserPermissionController::class, 'update'])
                ->name('users.permissions.update');
            Route::post('/users/{user}/permissions/{permission}/give', [UserPermissionController::class, 'givePermission'])
                ->name('users.permissions.give');
            Route::delete('/users/{user}/permissions/{permission}/revoke', [UserPermissionController::class, 'revokePermission'])
                ->name('users.permissions.revoke');
        });
        
        // Контакты - требует права contacts.view для просмотра
        Route::middleware(['permission:contacts.view'])->group(function () {
            Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
            Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        });
        
        // Контакты - требует права contacts.edit для удаления (так как это админское действие)
        Route::middleware(['permission:contacts.edit'])->group(function () {
            Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
        });
        
        // Справочники для заявок - должности
        Route::middleware(['permission:positions.view'])->group(function () {
            Route::get('/job-positions', [JobPositionController::class, 'index'])->name('job-positions.index');
        });
        Route::middleware(['permission:positions.create'])->group(function () {
            Route::get('/job-positions/create', [JobPositionController::class, 'create'])->name('job-positions.create');
            Route::post('/job-positions', [JobPositionController::class, 'store'])->name('job-positions.store');
        });
        Route::middleware(['permission:positions.edit'])->group(function () {
            Route::get('/job-positions/{jobPosition}/edit', [JobPositionController::class, 'edit'])->name('job-positions.edit');
            Route::put('/job-positions/{jobPosition}', [JobPositionController::class, 'update'])->name('job-positions.update');
        });
        Route::middleware(['permission:positions.delete'])->group(function () {
            Route::delete('/job-positions/{jobPosition}', [JobPositionController::class, 'destroy'])->name('job-positions.destroy');
        });
        
        // Справочники для заявок - технические навыки
        Route::middleware(['permission:skills.view'])->group(function () {
            Route::get('/technical-skills', [TechnicalSkillController::class, 'index'])->name('technical-skills.index');
        });
        Route::middleware(['permission:skills.create'])->group(function () {
            Route::get('/technical-skills/create', [TechnicalSkillController::class, 'create'])->name('technical-skills.create');
            Route::post('/technical-skills', [TechnicalSkillController::class, 'store'])->name('technical-skills.store');
        });
        Route::get('/test-route', function() {
            return "Laravel работает!";
        });
        Route::get('/test-skill/{id}', function($id) {
            $skill = \App\Models\TechnicalSkill::find($id);
            if (!$skill) {
                return "Навык не найден";
            }
            return "Навык найден: " . $skill->name_ru;
        });
        Route::get('/technical-skills/{technicalSkill}/edit', [TechnicalSkillController::class, 'edit'])->name('technical-skills.edit');
        Route::middleware(['permission:skills.edit'])->group(function () {
            Route::put('/technical-skills/{technicalSkill}', [TechnicalSkillController::class, 'update'])->name('technical-skills.update');
        });
        Route::middleware(['permission:skills.delete'])->group(function () {
            Route::delete('/technical-skills/{technicalSkill}', [TechnicalSkillController::class, 'destroy'])->name('technical-skills.destroy');
        });
        
        // Справочники для заявок - форматы работы
        Route::middleware(['permission:work_formats.view'])->group(function () {
            Route::get('/work-formats', [WorkFormatController::class, 'index'])->name('work-formats.index');
        });
        Route::middleware(['permission:work_formats.create'])->group(function () {
            Route::get('/work-formats/create', [WorkFormatController::class, 'create'])->name('work-formats.create');
            Route::post('/work-formats', [WorkFormatController::class, 'store'])->name('work-formats.store');
        });
        Route::middleware(['permission:work_formats.edit'])->group(function () {
            Route::get('/work-formats/{workFormat}/edit', [WorkFormatController::class, 'edit'])->name('work-formats.edit');
            Route::put('/work-formats/{workFormat}', [WorkFormatController::class, 'update'])->name('work-formats.update');
        });
        Route::middleware(['permission:work_formats.delete'])->group(function () {
            Route::delete('/work-formats/{workFormat}', [WorkFormatController::class, 'destroy'])->name('work-formats.destroy');
        });
        
        // Справочники для заявок - языки
        Route::middleware(['permission:languages.view'])->group(function () {
            Route::get('/languages', [LanguageController::class, 'index'])->name('languages.index');
        });
        Route::middleware(['permission:languages.create'])->group(function () {
            Route::get('/languages/create', [LanguageController::class, 'create'])->name('languages.create');
            Route::post('/languages', [LanguageController::class, 'store'])->name('languages.store');
        });
        Route::middleware(['permission:languages.edit'])->group(function () {
            Route::get('/languages/{language}/edit', [LanguageController::class, 'edit'])->name('languages.edit');
            Route::put('/languages/{language}', [LanguageController::class, 'update'])->name('languages.update');
        });
        Route::middleware(['permission:languages.delete'])->group(function () {
            Route::delete('/languages/{language}', [LanguageController::class, 'destroy'])->name('languages.destroy');
        });
        
        // Справочники для заявок - города
        Route::middleware(['permission:cities.view'])->group(function () {
            Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
        });
        Route::middleware(['permission:cities.create'])->group(function () {
            Route::get('/cities/create', [CityController::class, 'create'])->name('cities.create');
            Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
        });
        Route::middleware(['permission:cities.edit'])->group(function () {
            Route::get('/cities/{city}/edit', [CityController::class, 'edit'])->name('cities.edit');
            Route::put('/cities/{city}', [CityController::class, 'update'])->name('cities.update');
        });
        Route::middleware(['permission:cities.delete'])->group(function () {
            Route::delete('/cities/{city}', [CityController::class, 'destroy'])->name('cities.destroy');
        });
    });

Route::get('/contact', [ContactController::class, 'showForm'])
    ->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])
    ->name('contact.submit')
    ->middleware(['anti.spam', 'throttle:3,1']);

// Тестовый маршрут для проверки reCAPTCHA (должен быть ДО маршрутов с префиксом {lang})
Route::get('/test-recaptcha', function () {
    return view('test-recaptcha');
})->name('test.recaptcha');

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
            
            // Найти категорию Bitrix по slug (пробуем разные варианты)
            $bitrixCategory = Categories::where(function($query) {
                    $query->where('slug', 'bitrix')
                          ->orWhere('slug', 'bitrix24');
                })
                ->where('status', true)
                ->first();
            
            // Если не нашли по slug, попробуем найти по имени в переводах
            if (!$bitrixCategory) {
                $bitrixCategory = Categories::whereHas('translations', function($query) {
                        $query->where('name', 'LIKE', '%bitrix%')
                              ->orWhere('name', 'LIKE', '%Битрикс%');
                    })
                    ->where('status', true)
                    ->first();
            }
            
            // Получить проекты с категорией Bitrix (только если категория найдена)
            $bitrixProjects = collect();
            
            if ($bitrixCategory) {
                $bitrixProjects = Portfolio::with(['translations', 'categories.translations'])
                    ->where('status', true)
                    ->whereHas('categories', function ($relation) use ($bitrixCategory) {
                        $relation->where('categories.id', $bitrixCategory->id);
                    })
                    ->orderBy('ordering')
                    ->orderBy('created_at', 'desc')
                    ->get();
            }
            
            return view('bitrix', compact('lang', 'bitrixProjects'));
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
        Route::get('/portfolio/filter', [PublicPortfolioController::class, 'filter'])
            ->name('portfolio.filter');
        Route::get('/portfolio/{portfolio}', [PublicPortfolioController::class, 'show'])
            ->name('portfolio.show');

        // Job Positions (public)
        Route::get('/jobs', [PublicJobPositionController::class, 'all'])
            ->name('jobs.index');
        Route::get('/jobs/{jobPosition}', [PublicJobPositionController::class, 'show'])
            ->name('jobs.show');

        // Contacts
        Route::get('/contacts', function ($lang) {
            App::setLocale($lang);
            $leftMenu = true;
            $currentPage = '';
            return view('contacts', compact('leftMenu', 'currentPage', 'lang'));
        })->name('contacts');

    });

// ---------------------------------------
// Public Application Routes (без префикса admin)
// ---------------------------------------
Route::get('/applications/create', [PublicApplicationController::class, 'create'])->name('applications.create');
Route::post('/applications', [PublicApplicationController::class, 'store'])->name('applications.store')->middleware(['anti.spam', 'throttle:1,1']);

// API маршрут для получения навыков по должностям
Route::post('/api/positions/skills', [PublicApplicationController::class, 'getSkillsByPositions'])->name('api.positions.skills');
