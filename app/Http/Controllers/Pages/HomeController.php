<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $galleri = Gallery::all();

        $product = Product::take(6)->orderBy('id', 'DESC')->get();

        $benefit = Benefit::take(4)->orderBy('id', 'DESC')->get();

        return view("pages.home", compact("galleri", "product", "benefit"));
    }
}
