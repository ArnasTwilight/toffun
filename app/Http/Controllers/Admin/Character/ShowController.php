<?php

namespace App\Http\Controllers\Admin\Character;

use App\Models\Character;
use App\Models\WeaponEffects;

class ShowController extends BaseController
{
    public function __invoke(Character $character)
    {
        $effects = WeaponEffects::query()->where('character_id', $character->id)->get();
        return view('admin.character.show', compact('character','effects'));
    }
}
