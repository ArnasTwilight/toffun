<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Http\Requests\Admin\Rarity\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.rarity.index');
    }
}
