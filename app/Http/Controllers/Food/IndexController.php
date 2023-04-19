<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $food = Food::all();
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        return view('food.index', compact('food', 'popularPosts'));
    }
}
