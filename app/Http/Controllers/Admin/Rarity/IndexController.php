<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Http\Controllers\Controller;
use App\Models\Rarity;

class IndexController extends Controller
{
    public function __invoke()
    {
        $rarityList = Rarity::paginate(9);
        return view('admin.rarity.index', compact('rarityList'));
    }
}
