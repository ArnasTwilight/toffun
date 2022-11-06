<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Models\Rarity;
use App\Models\Relic;
use App\Models\Star;

class EditController extends BaseController
{
    public function __invoke(Relic $relic)
    {
        $rarityList = Rarity::all();
        $stars = Star::find($relic->stars_id);
        return view('admin.relic.edit', compact('relic', 'rarityList', 'stars'));
    }
}
