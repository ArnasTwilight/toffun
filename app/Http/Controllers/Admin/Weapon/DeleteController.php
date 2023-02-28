<?php

namespace App\Http\Controllers\Admin\Weapon;

use App\Models\Weapon;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Weapon $weapon)
    {
        if ($weapon['image'] != 'images/placeholder/no_weapon_image.png'){
            Storage::disk('public')->delete($weapon['image']);
        }

        $weapon->delete();
        return redirect()->route('admin.weapon.index');
    }
}
