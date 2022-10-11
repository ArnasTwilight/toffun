<?php

namespace App\Http\Controllers\Admin\Weapon;

use App\Http\Requests\Admin\Weapon\UpdateRequest;
use App\Models\Weapon;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Weapon $weapon)
    {
        $data = $request->validated();
        $this->service->update($data, $weapon);

        return redirect()->route('admin.weapon.show', compact('weapon'));
    }
}
