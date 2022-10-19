<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Models\Ingredient;

class ShowController extends BaseController
{
    public function __invoke(Ingredient $ingredient)
    {
        return view('admin.ingredient.show', compact('ingredient'));
    }
}
