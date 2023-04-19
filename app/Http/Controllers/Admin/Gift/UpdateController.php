<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Http\Requests\Admin\Gift\UpdateRequest;
use App\Models\Gift;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Gift $gift)
    {
        $data = $request->validated();
        $this->service->update($data, $gift);

        return redirect()->route('admin.gift.show', compact('gift'));
    }
}
