<?php

namespace App\Http\Controllers\Admin\Character;

use App\Models\Character;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $characters = Character::paginate(9);
        return view('admin.character.index', compact('characters'));
    }
}
