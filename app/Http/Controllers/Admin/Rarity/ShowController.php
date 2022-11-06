<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Models\Rarity;

class ShowController extends BaseController
{
    public function __invoke(Rarity $rarity)
    {
        return view('admin.rarity.show', compact('rarity'));
    }
}
