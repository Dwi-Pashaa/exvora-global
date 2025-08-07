<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Benefit;
use App\Models\Blog;
use App\Models\Categori;
use App\Models\Company;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        FacadesView::composer('pages/*', function ($view) {
            $locale = App::getLocale();

            $companie = Company::latest()->first();

            $categorie = Categori::all();

            $about = About::latest()->first();

            $slider = Slider::take(3)->orderBy('id', 'DESC')->get();

            $blog = Blog::with('categori', 'user')->take(4)->orderBy('id', 'DESC')->get();

            $view->with([
                'locale' => $locale,
                'companie' => $companie,
                'about' => $about,
                'categorie' => $categorie,
                'slider' => $slider,
                'blog' => $blog
            ]);
        });
    }
}
