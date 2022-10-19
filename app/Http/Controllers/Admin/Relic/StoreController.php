<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Http\Requests\Admin\Relic\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.relic.index');
    }
}
