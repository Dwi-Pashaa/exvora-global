<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Categori;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $categori = $request->categori ?? null;
        $search = $request->search ?? null;

        $blogs = Blog::with(['user', 'categori'])
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhereHas('categori', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->when($categori, function ($query) use ($categori) {
                $query->whereHas('categori', function ($q) use ($categori) {
                    $q->where('slug', $categori);
                });
            })
            ->orderBy('id', 'DESC')
            ->paginate(5);

        $listCategori = Categori::where('type', 'blog')->get();

        $recentBlogs = Blog::with('categori')
            ->latest()
            ->take(5)
            ->get();

        return view("pages.blog", compact("blogs", "listCategori", "recentBlogs"));
    }

    public function show(string $id)
    {
        $blogs = Blog::with(['user', 'categori'])->where('id', $id)->first();

        if (!$blogs) {
            return abort(404);
        }

        $listCategori = Categori::where('type', 'blog')->get();

        $recentBlogs = Blog::with('categori')
            ->latest()
            ->take(5)
            ->get();

        return view("pages.blog-detail", compact("blogs", "listCategori", "recentBlogs"));
    }
}
