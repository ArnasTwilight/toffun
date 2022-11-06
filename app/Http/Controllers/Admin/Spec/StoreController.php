<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Http\Requests\Admin\Spec\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.spec.index');
    }
}
