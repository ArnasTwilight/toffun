<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Rarity;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Rarity $rarity)
    {
        $data = $request->validated();
        $rarity->update($data);
        return redirect()->route('admin.rarity.show', compact('rarity'));
    }
}
