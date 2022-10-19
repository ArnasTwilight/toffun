<?php

namespace App\Http\Controllers\Admin\Character;

use App\Models\Matrix;
use App\Models\Rarity;
use App\Models\Spec;
use App\Models\Weapon;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $specList = Spec::all();
        $rarityList = Rarity::all();
        $weapons = Weapon::all();
        $matrices = Matrix::all();
        return view('admin.character.create', compact('specList', 'rarityList', 'weapons', 'matrices'));
    }
}
