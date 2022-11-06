<?php

namespace App\Http\Controllers\Admin\Element;

use App\Http\Requests\Admin\Element\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.element.index');
    }
}
