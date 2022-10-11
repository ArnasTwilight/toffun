<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.rarity.create');
    }
}
