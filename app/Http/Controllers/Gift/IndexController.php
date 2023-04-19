<?php

namespace App\Http\Controllers\Gift;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $gifts = Gift::all();
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        return view('gift.index', compact('gifts', 'popularPosts'));
    }
}
