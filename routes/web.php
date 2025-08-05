<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
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

    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('setting');
        Route::post('/update-account', [SettingController::class, 'updateAccount'])->name('setting.update.account');
        Route::get('/companie-profile', [SettingController::class, 'companie'])->name('setting.companie.profile');
        Route::post('/update-companie', [SettingController::class, 'updateCompanie'])->name('setting.companie.update');
        Route::get('/seo-management', [SettingController::class, 'seo'])->name('setting.seo');
    });
});
