<?php

namespace App\Http\Controllers\Admin\Character;

use App\Models\Character;

class ShowController extends BaseController
{
    public function __invoke(Character $character)
    {
        return view('admin.character.show', compact('character'));
    }
}
