<?php

namespace App\Http\Controllers\Admin\Character;

use App\Models\Character;
use App\Models\Matrix;
use App\Models\Rarity;
use App\Models\Spec;
use App\Models\Star;
use App\Models\Weapon;

class EditController extends BaseController
{
    public function __invoke(Character $character)
    {
        $specList = Spec::all();
        $rarityList = Rarity::all();
        $weapons = Weapon::all();
        $matrices = Matrix::all();
        $stars = Star::find($character->stars_id);
        return view('admin.character.edit', compact('character', 'specList', 'rarityList', 'weapons', 'matrices', 'stars'));
    }
}
