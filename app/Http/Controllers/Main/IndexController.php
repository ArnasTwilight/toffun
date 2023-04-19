<?php

namespace App\Http\Controllers\Main;

use App\Models\Character;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get()->take(2);
        $characters = Character::orderBy('created_at', 'DESC')->get()->take(2);
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        $articles = $this->service->MergeAndSortArray($posts, $characters);

        return view('main.index', compact('posts', 'characters', 'popularPosts', 'articles'));
    }
}
