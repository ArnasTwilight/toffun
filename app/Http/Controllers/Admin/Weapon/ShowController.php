<?php

namespace App\Http\Controllers\Admin\Weapon;

use App\Models\Weapon;

class ShowController extends BaseController
{
    public function __invoke(Weapon $weapon)
    {
        return view('admin.weapon.show', compact('weapon'));
    }
}
