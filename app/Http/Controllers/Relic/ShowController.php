<?php

namespace App\Http\Controllers\Relic;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Relic;

class ShowController extends Controller
{
    public function __invoke(Relic $relic)
    {
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        return view('relic.show', compact('relic', 'popularPosts'));
    }
}
