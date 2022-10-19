<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Models\Ingredient;

class DeleteController extends BaseController
{
    public function __invoke(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('admin.ingredient.index');
    }
}
