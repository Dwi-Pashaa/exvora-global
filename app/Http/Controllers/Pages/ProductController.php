<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Categori;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search ?? null;
        $categori = $request->categori ?? null;

        $listCategori = Categori::with(['subCategori'])->where('type', 'product')->get();

        $product = Product::with(['subCategori'])
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($categori, function ($query) use ($categori) {
                $query->whereHas('subCategori', function ($q) use ($categori) {
                    $q->where('slug', $categori);
                });
            })
            ->orderBy('id', 'DESC')->paginate(6);

        return view("pages.product", compact("listCategori", "product"));
    }

    public function show(string $id)
    {
        $product = Product::with(['subCategori', 'categori'])->find($id);

        if (!$product) {
            return back();
        }

        $listCategori = Categori::with(['subCategori'])->where('type', 'product')->get();

        return view("pages.product-detail", compact("listCategori", "product"));
    }
}
