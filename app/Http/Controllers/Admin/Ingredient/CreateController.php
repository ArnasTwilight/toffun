<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Models\Rarity;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $rarityList = Rarity::all();
        return view('admin.ingredient.create', compact('rarityList'));
    }
}
