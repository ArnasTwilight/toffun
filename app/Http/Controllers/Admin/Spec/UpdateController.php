<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Http\Requests\Admin\Spec\UpdateRequest;
use App\Models\Spec;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Spec $spec)
    {
        $data = $request->validated();
        $this->service->update($data, $spec);
        return redirect()->route('admin.spec.show', compact('spec'));
    }
}
