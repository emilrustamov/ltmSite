<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\JobPositionController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\TechnicalSkillController;
use App\Http\Controllers\Admin\WorkFormatController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPermissionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin', 'throttle:60,1'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        $registerCrudWithPermissions = function (
            string $uri,
            string $name,
            string $controller,
            string $permissionPrefix,
            string $parameter
        ): void {
            Route::middleware(["permission:{$permissionPrefix}.view"])->group(function () use ($uri, $name, $controller) {
                Route::get("/{$uri}", [$controller, 'index'])->name("{$name}.index");
            });

            Route::middleware(["permission:{$permissionPrefix}.create"])->group(function () use ($uri, $name, $controller) {
                Route::get("/{$uri}/create", [$controller, 'create'])->name("{$name}.create");
                Route::post("/{$uri}", [$controller, 'store'])->name("{$name}.store");
            });

            Route::middleware(["permission:{$permissionPrefix}.edit"])->group(function () use ($uri, $name, $controller, $parameter) {
                Route::get("/{$uri}/{{$parameter}}/edit", [$controller, 'edit'])->name("{$name}.edit");
                Route::put("/{$uri}/{{$parameter}}", [$controller, 'update'])->name("{$name}.update");
            });

            Route::middleware(["permission:{$permissionPrefix}.delete"])->group(function () use ($uri, $name, $controller, $parameter) {
                Route::delete("/{$uri}/{{$parameter}}", [$controller, 'destroy'])->name("{$name}.destroy");
            });
        };

        Route::get('/', function () {
            return redirect()->route('admin.portfolios.index');
        })->name('dashboard');

        $registerCrudWithPermissions('portfolios', 'portfolios', PortfolioController::class, 'portfolio', 'portfolio');
        $registerCrudWithPermissions('categories', 'categories', CategoryController::class, 'categories', 'category');
        $registerCrudWithPermissions('news', 'news', NewsController::class, 'news', 'news');

        Route::middleware(['permission:applications.view'])->group(function () {
            Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
            Route::get('/applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
            Route::get('/applications/{application}/download-cv', [ApplicationController::class, 'downloadCv'])->name('applications.download-cv');
        });
        Route::middleware(['permission:applications.delete'])->group(function () {
            Route::delete('/applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
        });

        $registerCrudWithPermissions('users', 'users', UserController::class, 'users', 'user');

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

        Route::middleware(['permission:contacts.view'])->group(function () {
            Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
            Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
        });
        Route::middleware(['permission:contacts.edit'])->group(function () {
            Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');
        });

        $registerCrudWithPermissions('job-positions', 'job-positions', JobPositionController::class, 'positions', 'jobPosition');
        $registerCrudWithPermissions('technical-skills', 'technical-skills', TechnicalSkillController::class, 'skills', 'technicalSkill');
        $registerCrudWithPermissions('work-formats', 'work-formats', WorkFormatController::class, 'work_formats', 'workFormat');
        $registerCrudWithPermissions('languages', 'languages', LanguageController::class, 'languages', 'language');
        $registerCrudWithPermissions('cities', 'cities', CityController::class, 'cities', 'city');
    });
