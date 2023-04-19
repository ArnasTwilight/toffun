<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();
        return view('tag.index', compact('tags', 'popularPosts'));
    }
}
