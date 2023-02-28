<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $comments = Comment::orderBy('created_at', 'DESC')->where('post_id', '=', $post->id)->paginate(5);

        return view('post.show', compact('post', 'comments'));
    }
}
