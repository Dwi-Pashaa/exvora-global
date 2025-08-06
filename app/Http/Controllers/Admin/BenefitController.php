<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? null;
        $sort   = $request->sort ?? 10;

        $benefit = Benefit::when($search, function ($query, $search) {
            $query->where('title_id', 'like', "%{$search}%")
                ->orWhere('desc_id', 'like', "%{$search}%");
        })->paginate($sort);

        return view("admin.benefit.index", compact("benefit"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.benefit.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title_id" => "required",
            "title_en" => "required",
            "desc_id"  => "required",
            "desc_en"  => "required",
            "icon"    => "required"
        ]);

        $post = $request->all();

        Benefit::create($post);

        return redirect()->route('pages.benefit')->with('success', 'Berhasil menyimpan data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Benefit::find($id);

        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Data not found.']);
        }

        $data->delete();

        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
