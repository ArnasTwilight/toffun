<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Models\Matrix;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $matrices = Matrix::paginate(9);
        return view('admin.matrix.index', compact('matrices'));
    }
}
