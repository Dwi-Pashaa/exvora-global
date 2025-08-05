<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Categori;
use App\Models\Company;
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
        FacadesView::composer('*', function ($view) {
            $locale = App::getLocale();

            $companie = Company::latest()->first();

            $categorie = Categori::all();

            $about = About::latest()->first();

            $view->with([
                'locale' => $locale,
                'companie' => $companie,
                'about' => $about,
                'categorie' => $categorie,
            ]);
        });
    }
}
