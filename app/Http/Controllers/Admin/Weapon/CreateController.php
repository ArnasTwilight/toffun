<?php

namespace App\Http\Controllers\Admin\Weapon;

use App\Models\Element;
use App\Models\Rarity;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $elements = Element::all();
        $rarityList = Rarity::all();

        return view('admin.weapon.create', compact('elements', 'rarityList'));
    }
}
