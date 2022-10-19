<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Models\Character;

class IndexController extends Controller
{
    public function __invoke()
    {
        $characters = Character::all();

        return view('character.index', compact('characters'));
    }
}
