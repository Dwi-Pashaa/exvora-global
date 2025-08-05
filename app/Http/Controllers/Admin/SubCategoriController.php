<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $categori)
    {
        $search = $request->search ?? null;
        $sort   = $request->sort ?? 10;

        $subCategori = SubCategori::where('categori_id', $categori)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('id', 'DESC')
            ->paginate($sort);

        return view("admin.sub-categori.index", compact("subCategori", "categori"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $categori)
    {
        return view("admin.sub-categori.create", compact("categori"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $categori, Request $request)
    {
        $request->validate([
            "name" => "required|string"
        ]);

        $post = $request->all();
        $post['slug'] = Str::slug($request->name);

        SubCategori::create($post);

        return redirect()->route('product.sub.categori.index', ['categori' => $categori])->with('success', 'Berhasil menyimpan data.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $categori, string $id)
    {
        $data = SubCategori::find($id);

        if (!$data) {
            return back();
        }

        return view("admin.sub-categori.edit", compact("data", "categori"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $categori, Request $request, string $id)
    {
        $request->validate([
            "name" => "required|string"
        ]);

        $post = $request->all();
        $post['slug'] = Str::slug($request->name);

        $data = SubCategori::find($id);

        $data->update($post);

        return redirect()->route('product.sub.categori.index', ['categori' => $categori])->with('success', 'Berhasil menyimpan data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $categori, string $id)
    {
        $data = SubCategori::find($id);

        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Data not found.']);
        }

        $data->delete();

        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
