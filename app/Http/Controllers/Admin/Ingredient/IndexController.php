<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Models\Ingredient;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $ingredients = Ingredient::paginate(9);
        return view('admin.ingredient.index', compact('ingredients'));
    }
}
