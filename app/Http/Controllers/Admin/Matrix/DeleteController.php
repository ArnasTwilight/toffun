<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Models\Matrix;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Matrix $matrix)
    {
        if ($matrix['image'] != 'images/placeholder/no_matrix_image.png'){
            Storage::disk('public')->delete($matrix['image']);
        }

        $matrix->delete();
        return redirect()->route('admin.matrix.index');
    }
}
