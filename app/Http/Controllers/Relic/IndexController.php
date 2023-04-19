<?php

namespace App\Http\Controllers\Relic;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Relic;

class IndexController extends Controller
{
    public function __invoke()
    {
        $relics = Relic::all();
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        return view('relic.index', compact('relics', 'popularPosts'));
    }
}
