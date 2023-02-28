<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $count = auth()->user()->likedPosts()->count();
        $posts = auth()->user()->likedPosts()->paginate(4);
        return view('personal.liked.index', compact( 'posts', 'count'));
    }
}
