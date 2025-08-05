<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? null;
        $sort   = $request->sort ?? 10;

        $categori = Categori::where('type', 'product')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('id', 'DESC')
            ->paginate($sort);

        return view("admin.categori.index", compact("categori"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categori.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string"
        ]);

        $post = $request->all();
        $post['slug'] = Str::slug($request->name);

        Categori::create($post);

        return redirect()->route('product.categori.index')->with('success', 'Berhasil menyimpan data.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categori = Categori::find($id);

        if (!$categori) {
            return abort(404);
        }

        return view("admin.categori.edit", compact("categori"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "name" => "required|string"
        ]);

        $post = $request->all();
        $post['slug'] = Str::slug($request->name);

        $data = Categori::find($id);

        $data->update($post);

        return redirect()->route('product.categori.index')->with('success', 'Berhasil menyimpan data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Categori::find($id);

        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Data not found.']);
        }

        $data->delete();

        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
