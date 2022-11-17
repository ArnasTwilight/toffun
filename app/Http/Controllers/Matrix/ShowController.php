<?php

namespace App\Http\Controllers\Matrix;

use App\Http\Controllers\Controller;
use App\Models\Matrix;

class ShowController extends Controller
{
    public function __invoke(Matrix $matrix)
    {
        return view('matrix.show', compact('matrix'));
    }
}
