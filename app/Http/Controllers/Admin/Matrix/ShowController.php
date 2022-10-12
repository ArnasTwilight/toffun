<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Models\Matrix;

class ShowController extends BaseController
{
    public function __invoke(Matrix $matrix)
    {
        return view('admin.matrix.show', compact('matrix'));
    }
}
