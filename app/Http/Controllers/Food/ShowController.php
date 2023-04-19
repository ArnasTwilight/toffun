<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Food $food)
    {
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        return view('food.show', compact('food', 'popularPosts'));
    }
}
