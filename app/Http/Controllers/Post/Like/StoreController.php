<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->LikedPosts()->toggle($post->id);

        return back()->withInput();
    }
}
