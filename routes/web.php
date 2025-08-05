<?php

use App\Http\Controllers\Admin\CategoriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoriController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Pages\HomeController;
use Illuminate\Support\Facades\Route;

// home-page
Route::get('/', [HomeController::class, 'index'])->name('home');

// admin-page
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/check', [LoginController::class, 'login'])->name('login.post');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware(['auth']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('product')->group(function () {
        Route::prefix('categori')->group(function () {
            Route::get('/', [CategoriController::class, 'index'])->name('product.categori.index');
            Route::get('/create', [CategoriController::class, 'create'])->name('product.categori.create');
            Route::post('/store', [CategoriController::class, 'store'])->name('product.categori.store');
            Route::get('/{id}/edit', [CategoriController::class, 'edit'])->name('product.categori.edit');
            Route::put('/{id}/update', [CategoriController::class, 'update'])->name('product.categori.update');
            Route::delete('/{id}/destroy', [CategoriController::class, 'destroy'])->name('product.categori.destroy');

            Route::prefix('{categori}/sub-categori')->group(function () {
                Route::get('/', [SubCategoriController::class, 'index'])->name('product.sub.categori.index');
                Route::get('/create', [SubCategoriController::class, 'create'])->name('product.sub.categori.create');
                Route::post('/store', [SubCategoriController::class, 'store'])->name('product.sub.categori.store');
                Route::get('/{id}/edit', [SubCategoriController::class, 'edit'])->name('product.sub.categori.edit');
                Route::put('/{id}/update', [SubCategoriController::class, 'update'])->name('product.sub.categori.update');
                Route::delete('/{id}/destroy', [SubCategoriController::class, 'destroy'])->name('product.sub.categori.destroy');
            });
        });
    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('setting');
        Route::post('/update-account', [SettingController::class, 'updateAccount'])->name('setting.update.account');
        Route::get('/companie-profile', [SettingController::class, 'companie'])->name('setting.companie.profile');
        Route::post('/update-companie', [SettingController::class, 'updateCompanie'])->name('setting.companie.update');
        Route::get('/seo-management', [SettingController::class, 'seo'])->name('setting.seo');
    });
});
