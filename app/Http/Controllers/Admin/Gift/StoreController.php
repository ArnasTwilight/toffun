<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Http\Requests\Admin\Gift\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.gift.index');
    }
}
