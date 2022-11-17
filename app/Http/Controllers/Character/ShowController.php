<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\WeaponEffects;

class ShowController extends Controller
{
    public function __invoke(Character $character)
    {
        $effects = WeaponEffects::query()->where('character_id', $character->id)->get();
        return view('character.show', compact('character', 'effects'));
    }
}
