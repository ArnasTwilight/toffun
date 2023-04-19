<?php

namespace App\Http\Controllers\Matrix;

use App\Http\Controllers\Controller;
use App\Models\Matrix;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $matrices = Matrix::all();
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        return view('matrix.index', compact('matrices', 'popularPosts'));
    }
}
