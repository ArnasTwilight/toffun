<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        return view('category.index', compact('categories', 'popularPosts'));
    }
}
