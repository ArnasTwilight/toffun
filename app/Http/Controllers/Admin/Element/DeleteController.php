<?php

namespace App\Http\Controllers\Admin\Element;

use App\Models\Element;

class DeleteController extends BaseController
{
    public function __invoke(Element $element)
    {
        $element->delete();
        return redirect()->route('admin.element.index');
    }
}
