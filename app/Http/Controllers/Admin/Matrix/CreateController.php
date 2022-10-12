<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Models\Character;
use App\Models\Rarity;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $rarityList = Rarity::all();
        return view('admin.matrix.create', compact('rarityList'));
    }
}
