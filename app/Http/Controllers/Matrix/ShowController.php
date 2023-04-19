<?php

namespace App\Http\Controllers\Matrix;

use App\Http\Controllers\Controller;
use App\Models\Matrix;
use App\Models\MatrixBonus;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke(Matrix $matrix)
    {
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();
        $matrixBonus = MatrixBonus::where('matrix_id', '=', $matrix->id)->get();

        return view('matrix.show', compact('matrix', 'popularPosts', 'matrixBonus'));
    }
}
