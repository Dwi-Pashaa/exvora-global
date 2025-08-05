<?php

namespace App\Providers;

use App\Models\Categori;
use App\Models\Company;
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
            $companie = Company::latest()->first();
            $categorie = Categori::all();
            $view->with([
                'companie' => $companie,
                'categorie' => $categorie,
            ]);
        });
    }
}
