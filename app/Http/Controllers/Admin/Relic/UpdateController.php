<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Http\Requests\Admin\Relic\UpdateRequest;
use App\Models\Relic;
use App\Models\Star;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Relic $relic)
    {
        $data = $request->validated();
        $star = Star::query()->find($relic->stars_id);
        $this->service->update($data, $relic, $star);

        return redirect()->route('admin.relic.show', compact('relic'));
    }
}
