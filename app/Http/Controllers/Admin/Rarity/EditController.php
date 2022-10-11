<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Http\Controllers\Controller;
use App\Models\Rarity;

class EditController extends Controller
{
    public function __invoke(Rarity $rarity)
    {
        return view('admin.rarity.edit', compact('rarity'));
    }
}
