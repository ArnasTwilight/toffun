<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Models\Rarity;
use App\Models\Relic;

class EditController extends BaseController
{
    public function __invoke(Relic $relic)
    {
        $rarityList = Rarity::all();
        return view('admin.relic.edit', compact('relic', 'rarityList'));
    }
}
