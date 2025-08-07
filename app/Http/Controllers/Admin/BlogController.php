<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search ?? null;
        $sort   = $request->sort ?? 10;

        $blog = Blog::with('categori')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhereHas('categori', function ($q2) use ($search) {
                            $q2->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->orderBy('created_at', 'DESC')
            ->paginate($sort);

        return view("admin.blog.list.index", compact("blog"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = Categori::where('type', 'blog')->get();
        return view("admin.blog.list.create", compact("categorie"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "categori_id" => "required",
            "desc_id" => "required",
            "desc_en" => "required",
            "image" => "required|mimes:png,jpg",
        ]);

        $post = $request->except('image');

        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('blog/'), $imageName);

        $post['user_id'] = Auth::user()->id;
        $post['image'] = 'blog/' . $imageName;

        Blog::create($post);

        return redirect()->route('blog.index')->with('success', 'Berhasil menyimpan data.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        $categorie = Categori::where('type', 'blog')->get();
        return view("admin.blog.list.edit", compact("blog", "categorie"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "categori_id" => "required",
            "desc_id" => "required",
            "desc_en" => "required",
            "image" => "nullable|mimes:png,jpg,jpeg|max:2048",
        ]);

        $blog = Blog::findOrFail($id);
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('blog/'), $imageName);

            $data['image'] = 'blog/' . $imageName;
        }

        $data['user_id'] = Auth::id();

        $blog->update($data);

        return redirect()->route('blog.index')->with('success', 'Berhasil menyimpan data.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Blog::find($id);

        if (!$data) {
            return response()->json(['status' => false, 'message' => 'Data not found.']);
        }

        $data->delete();

        return response()->json(['status' => true, 'message' => 'Data berhasil dihapus.']);
    }
}
