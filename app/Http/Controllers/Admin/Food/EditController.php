<?php

namespace App\Http\Controllers\Admin\Food;

use App\Models\Food;
use App\Models\Ingredient;
use App\Models\Rarity;
use App\Models\Spec;

class EditController extends BaseController
{
    public function __invoke(Food $food)
    {
        $rarityList = Rarity::all();
        $specList = Spec::all();
        $ingredients = Ingredient::all();

        return view('admin.food.edit', compact('food', 'specList', 'rarityList', 'ingredients'));
    }
}
