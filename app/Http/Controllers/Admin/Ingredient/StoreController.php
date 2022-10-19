<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Http\Requests\Admin\Ingredient\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.ingredient.index');
    }
}
