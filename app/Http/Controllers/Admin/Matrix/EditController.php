<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Models\Matrix;
use App\Models\MatrixBonus;
use App\Models\Rarity;

class EditController extends BaseController
{
    public function __invoke(Matrix $matrix)
    {
        $rarityList = Rarity::all();
        $matrixBonus = MatrixBonus::where('matrix_id', '=', $matrix->id)->get();

        return view('admin.matrix.edit', compact('matrix', 'rarityList', 'matrixBonus'));
    }
}
