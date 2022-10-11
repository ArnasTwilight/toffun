<?php

namespace App\Http\Controllers\Admin\Weapon;

use App\Models\Element;
use App\Models\Rarity;
use App\Models\Weapon;

class EditController extends BaseController
{
    public function __invoke(Weapon $weapon)
    {
        $elements = Element::all();
        $rarityList = Rarity::all();

        return view('admin.weapon.edit', compact('weapon', 'elements', 'rarityList'));
    }
}
