<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view("admin.about.index");
    }

    public function store(Request $request)
    {
        $request->validate([
            "desc_id" => "required|string",
            "desc_en" => "required|string"
        ]);

        $data = [
            'desc_id' => $request->desc_id,
            'desc_en' => $request->desc_en,
        ];

        About::updateOrCreate(
            ['id' => 1],
            $data
        );

        return redirect()->back()->with('success', 'Berhasil Mmenyimpan data.');
    }
}
