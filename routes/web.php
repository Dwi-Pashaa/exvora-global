<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BenefitController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\KategoriBlogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SubCategoriController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Pages\AboutController as PagesAboutController;
use App\Http\Controllers\Pages\BlogController as PagesBlogController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\GalleryController as PagesGalleryController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ProductController as PagesProductController;
use App\Http\Controllers\SetLocaleController;
use Illuminate\Support\Facades\Route;

// home-page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PagesAboutController::class, 'index'])->name('about');
Route::get('/gallery', [PagesGalleryController::class, 'index'])->name('gallery');
Route::get('/products', [PagesProductController::class, 'index'])->name('pages.product');
Route::get('/products/{id}/detail', [PagesProductController::class, 'show'])->name('pages.product.detail');
Route::get('/blogs', [PagesBlogController::class, 'index'])->name('blog');
Route::get('/blogs/{id}/detail', [PagesBlogController::class, 'show'])->name('blog.detail');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

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

        Route::prefix('list')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('product.list.index');
            Route::get('/create', [ProductController::class, 'create'])->name('product.list.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.list.store');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.list.edit');
            Route::put('/{id}/update', [ProductController::class, 'update'])->name('product.list.update');
            Route::delete('/{id}/destroy', [ProductController::class, 'destroy'])->name('product.list.destroy');
            Route::get('/get-sub-categori', [ProductController::class, 'getSubCategori'])->name('product.list.getSubCategori');
        });
    });

    Route::prefix('blog')->group(function () {
        Route::prefix('categori')->group(function () {
            Route::get('/', [KategoriBlogController::class, 'index'])->name('blog.categori.index');
            Route::get('/create', [KategoriBlogController::class, 'create'])->name('blog.categori.create');
            Route::post('/store', [KategoriBlogController::class, 'store'])->name('blog.categori.store');
            Route::get('/{id}/edit', [KategoriBlogController::class, 'edit'])->name('blog.categori.edit');
            Route::put('/{id}/update', [KategoriBlogController::class, 'update'])->name('blog.categori.update');
            Route::delete('/{id}/destroy', [KategoriBlogController::class, 'destroy'])->name('blog.categori.destroy');
        });

        Route::prefix('list')->group(function () {
            Route::get('/', [BlogController::class, 'index'])->name('blog.index');
            Route::get('/create', [BlogController::class, 'create'])->name('blog.create');
            Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
            Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
            Route::put('/{id}/update', [BlogController::class, 'update'])->name('blog.update');
            Route::delete('/{id}/destroy', [BlogController::class, 'destroy'])->name('blog.destroy');
        });
    });

    Route::prefix('pages')->group(function () {
        Route::prefix('slider')->group(function () {
            Route::get('/', [SliderController::class, 'index'])->name('pages.slider');
            Route::get('/create', [SliderController::class, 'create'])->name('pages.slider.create');
            Route::post('/store', [SliderController::class, 'store'])->name('pages.slider.store');
            Route::delete('/{id}/destroy', [SliderController::class, 'destroy'])->name('pages.slider.destroy');
        });

        Route::prefix('benefit')->group(function () {
            Route::get('/', [BenefitController::class, 'index'])->name('pages.benefit');
            Route::get('/create', [BenefitController::class, 'create'])->name('pages.benefit.create');
            Route::post('/store', [BenefitController::class, 'store'])->name('pages.benefit.store');
            Route::delete('/{id}/destroy', [BenefitController::class, 'destroy'])->name('pages.benefit.destroy');
        });

        Route::prefix('about')->group(function () {
            Route::get('/', [AboutController::class, 'index'])->name('pages.about');
            Route::post('/store', [AboutController::class, 'store'])->name('pages.about.store');
        });

        Route::prefix('galleri')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('pages.galeri');
            Route::get('/create', [GalleryController::class, 'create'])->name('pages.galeri.create');
            Route::post('/store', [GalleryController::class, 'store'])->name('pages.galeri.store');
            Route::delete('/{id}/destroy', [GalleryController::class, 'destroy'])->name('pages.galeri.destroy');
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

Route::get('/{lang}/set-locale', [SetLocaleController::class, 'setLocal'])->name('setlocale');
