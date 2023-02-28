<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $posts = auth()->user()->likedPosts()->limit(3)->orderBy('created_at', 'DESC')->get();
        $comments = auth()->user()->comments()->limit(3)->orderBy('created_at', 'DESC')->get();
        return view('personal.main.index', compact('user', 'posts', 'comments'));
    }
}
