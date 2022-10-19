<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Http\Requests\Admin\Relic\UpdateRequest;
use App\Models\Relic;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Relic $relic)
    {
        $data = $request->validated();
        $this->service->update($data, $relic);

        return redirect()->route('admin.relic.show', compact('relic'));
    }
}
