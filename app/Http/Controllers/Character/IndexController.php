<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Element;
use App\Models\Spec;

class IndexController extends Controller
{
    public function __invoke()
    {
        $characters = Character::all();
        $specList = Spec::all();
        $elements = Element::all();
        return view('character.index', compact('characters', 'specList', 'elements'));
    }
}
