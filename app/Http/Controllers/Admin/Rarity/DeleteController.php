<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Http\Controllers\Controller;
use App\Models\Rarity;

class DeleteController extends Controller
{
    public function __invoke(Rarity $rarity)
    {
        $rarity->delete();
        return redirect()->route('admin.rarity.index');
    }
}
