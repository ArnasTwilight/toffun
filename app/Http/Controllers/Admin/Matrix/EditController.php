<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Models\Matrix;

class EditController extends BaseController
{
    public function __invoke(Matrix $matrix)
    {
        return view('admin.matrix.edit', compact('matrix'));
    }
}
