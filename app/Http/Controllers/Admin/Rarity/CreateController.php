<?php

namespace App\Http\Controllers\Admin\Rarity;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.rarity.create');
    }
}
