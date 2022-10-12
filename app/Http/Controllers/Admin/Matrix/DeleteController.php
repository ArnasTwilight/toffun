<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Models\Matrix;

class DeleteController extends BaseController
{
    public function __invoke(Matrix $matrix)
    {
        $matrix->delete();
        return redirect()->route('admin.matrix.index');
    }
}
