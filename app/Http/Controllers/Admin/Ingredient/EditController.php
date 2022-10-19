<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Models\Ingredient;
use App\Models\Rarity;

class EditController extends BaseController
{
    public function __invoke(Ingredient $ingredient)
    {
        $rarityList = Rarity::all();
        return view('admin.ingredient.edit', compact('ingredient', 'rarityList'));
    }
}
