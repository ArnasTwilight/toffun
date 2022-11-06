<?php

namespace App\Http\Controllers\Admin\Element;

use App\Http\Requests\Admin\Element\UpdateRequest;
use App\Models\Element;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Element $element)
    {
        $data = $request->validated();
        $this->service->update($data, $element);
        return redirect()->route('admin.element.show', compact('element'));
    }
}
