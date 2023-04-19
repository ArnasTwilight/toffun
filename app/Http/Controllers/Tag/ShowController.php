<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();
        $tagPosts = $tag->posts()->paginate(4);

        return view('tag.show', compact('tag', 'popularPosts', 'tagPosts'));
    }
}
