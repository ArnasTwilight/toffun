<?php

namespace App\Http\Controllers\Admin\Weapon;

use App\Models\Weapon;

class DeleteController extends BaseController
{
    public function __invoke(Weapon $weapon)
    {
        $weapon->delete();
        return redirect()->route('admin.weapon.index');
    }
}
