<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Models\Gift;
use App\Models\Rarity;

class EditController extends BaseController
{
    public function __invoke(Gift $gift)
    {
        $rarityList = Rarity::all();

        return view('admin.gift.edit', compact('gift', 'rarityList'));
    }
}
