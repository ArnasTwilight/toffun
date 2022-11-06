<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Models\Rarity;

class EditController extends BaseController
{
    public function __invoke(Rarity $rarity)
    {
        return view('admin.rarity.edit', compact('rarity'));
    }
}
