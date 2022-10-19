<?php

namespace App\Http\Controllers\Admin\Food;

use App\Http\Requests\Admin\Food\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.food.index');
    }
}
