<?php

namespace App\Http\Controllers\Matrix;

use App\Http\Controllers\Controller;
use App\Models\Matrix;

class IndexController extends Controller
{
    public function __invoke()
    {
        $matrices = Matrix::all();
        return view('matrix.index', compact('matrices'));
    }
}
