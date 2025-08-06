<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? null;
        $sort   = $request->sort ?? 10;

        $slider = Slider::when($search, function ($query, $search) {
            $query->where('title_id', 'like', "%{$search}%")
                ->orWhere('desc_id', 'like', "%{$search}%");
        })->get();

        return view("admin.slider.index", compact("slider"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.slider.create");
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
            "image"    => "required|mimes:png,jpg"
        ]);

        $post = $request->except('image');

        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('slider/'), $imageName);

        $post['image'] = 'slider/' . $imageName;

        Slider::create($post);

        return redirect()->route('pages.slider')->with('success', 'Berhasil menyimpan data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Slider::find($id);

        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Data not found.']);
        }

        $data->delete();

        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
