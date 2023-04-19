<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Models\Matrix;
use App\Models\MatrixBonus;

class ShowController extends BaseController
{
    public function __invoke(Matrix $matrix)
    {
        $matrixBonus = MatrixBonus::where('matrix_id', '=', $matrix->id)->get();

        return view('admin.matrix.show', compact('matrix', 'matrixBonus'));
    }
}
