<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Rarity;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Rarity::firstOrCreate($data);
        return redirect()->route('admin.rarity.index');
    }
}
