<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Http\Requests\Admin\Rarity\UpdateRequest;
use App\Models\Rarity;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Rarity $rarity)
    {
        $data = $request->validated();
        $this->service->update($data, $rarity);
        return redirect()->route('admin.rarity.show', compact('rarity'));
    }
}
