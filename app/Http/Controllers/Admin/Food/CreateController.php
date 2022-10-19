<?php

namespace App\Http\Controllers\Admin\Food;

use App\Models\Ingredient;
use App\Models\Rarity;
use App\Models\Spec;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $rarityList = Rarity::all();
        $specList = Spec::all();
        $ingredients = Ingredient::all();

        return view('admin.food.create', compact('rarityList', 'specList', 'ingredients'));
    }
}
