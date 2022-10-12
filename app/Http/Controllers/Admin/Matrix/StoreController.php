<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Http\Requests\Admin\Matrix\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.matrix.index');
    }
}
