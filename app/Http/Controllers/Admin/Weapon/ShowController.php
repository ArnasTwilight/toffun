<?php

namespace App\Http\Controllers\Admin\Weapon;

use App\Models\Weapon;

class ShowController extends BaseController
{
    public function __invoke(Weapon $weapon)
    {
        $weaponAttacks = [];

        for ($i = 0; $i != count($weapon->weaponAttacks); $i++) {
            switch ($weapon->weaponAttacks[$i]->type):
                case 1 :
                    $weaponAttacks['normal'][] = $weapon->weaponAttacks[$i];
                    break;
                case 2 :
                    $weaponAttacks['dodge'][] = $weapon->weaponAttacks[$i];
                    break;
                case 3 :
                    $weaponAttacks['skill'][] = $weapon->weaponAttacks[$i];
                    break;
                case 4 :
                    $weaponAttacks['discharge'][] = $weapon->weaponAttacks[$i];
                    break;
            endswitch;
        }

        return view('admin.weapon.show', compact('weapon', 'weaponAttacks'));
    }
}
