<?php

namespace App\Http\Controllers\Admin\Element;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Element;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Element $element)
    {
        $data = $request->validated();
        $element->update($data);
        return redirect()->route('admin.element.show', compact('element'));
    }
}
