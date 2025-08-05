<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocaleController extends Controller
{
    public function setLocal($lang)
    {
        if (in_array($lang, ['en', 'id'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }

        return back();
    }
}
