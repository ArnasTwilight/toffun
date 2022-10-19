<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Models\Rarity;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $rarityList = Rarity::all();

        return view('admin.relic.create', compact('rarityList'));
    }
}
