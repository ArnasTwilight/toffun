<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Models\Matrix;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $matrices = Matrix::query()->orderBy('created_at', 'desc')->paginate(7);
        return view('admin.matrix.index', compact('matrices'));
    }
}
