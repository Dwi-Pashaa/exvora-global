<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categori;
use App\Models\Product;
use App\Models\SubCategori;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? null;
        $sort   = $request->sort ?? 10;

        $product = Product::when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('desc', 'like', "%{$search}%");
        })->paginate($sort);

        return view("admin.product.index", compact("product"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = Categori::where('type', 'product')->get();
        return view("admin.product.create", compact("categorie"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "categori_id" => "required",
            "sub_categori_id" => "required",
            "desc_id" => "required",
            "desc_en" => "required",
            "image" => "required|mimes:png,jpg",
            "catalog" => "required|mimes:png,jpg",
            "sort" => "required",
            "status" => "required",
        ]);

        $post = $request->except(['image', 'catalog']);

        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $imageFolder = 'product/';
        $image->move(public_path($imageFolder), $imageName);
        $post['image'] = $imageFolder . $imageName;

        $catalog = $request->file('catalog');
        $catalogName = rand() . '.' . $catalog->getClientOriginalExtension();
        $catalogFolder = 'catalog/';
        $catalog->move(public_path($catalogFolder), $catalogName);
        $post['catalog'] = $catalogFolder . $catalogName;

        Product::create($post);

        return redirect()->route('product.list.index')->with('success', 'Berhasil menyimpan data.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $categorie = Categori::where('type', 'product')->get();
        return view("admin.product.edit", compact("product", "categorie"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string",
            "categori_id" => "required",
            "sub_categori_id" => "required",
            "desc_id" => "required",
            "desc_en" => "required",
            "sort" => "required",
            "status" => "required",
            "image" => "nullable|mimes:png,jpg",
            "catalog" => "nullable|mimes:png,jpg",
        ]);

        $product = Product::find($id);

        $post = $request->except(['image', 'catalog']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $imageFolder = 'product/';
            $image->move(public_path($imageFolder), $imageName);
            $post['image'] = $imageFolder . $imageName;
        }

        if ($request->hasFile('catalog')) {
            $catalog = $request->file('catalog');
            $catalogName = rand() . '.' . $catalog->getClientOriginalExtension();
            $catalogFolder = 'catalog/';
            $catalog->move(public_path($catalogFolder), $catalogName);
            $post['catalog'] = $catalogFolder . $catalogName;
        }

        $product->update($post);

        return redirect()->route('product.list.index')->with('success', 'Berhasil menyimpan data.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['status' => false, 'message' => 'prod$product not found.']);
        }

        $product->delete();

        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus.']);
    }

    public function getSubCategori(Request $request)
    {
        $subCategori = SubCategori::where('categori_id', $request->categori_id)->get();

        return response()->json(['status' => true, 'data' => $subCategori]);
    }
}
