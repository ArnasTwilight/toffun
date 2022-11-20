<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Models\Rarity;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $rarityList = Rarity::all();
        return view('admin.gift.create', compact('rarityList'));
    }
}
