<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Http\Controllers\Controller;
use App\Models\Rarity;

class ShowController extends Controller
{
    public function __invoke(Rarity $rarity)
    {
        return view('admin.rarity.show', compact('rarity'));
    }
}
