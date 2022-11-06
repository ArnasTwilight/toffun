<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Models\Rarity;

class DeleteController extends BaseController
{
    public function __invoke(Rarity $rarity)
    {
        $rarity->delete();
        return redirect()->route('admin.rarity.index');
    }
}
