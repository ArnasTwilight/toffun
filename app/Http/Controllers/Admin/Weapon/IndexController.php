<?php

namespace App\Http\Controllers\Admin\Weapon;

use App\Models\Weapon;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $weapons = Weapon::paginate(9);
        return view('admin.weapon.index', compact('weapons'));
    }
}
