<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $count = auth()->user()->comments()->count();
        $comments = auth()->user()->comments()->paginate(12);
        return view('personal.comment.index', compact( 'comments', 'count'));
    }
}
