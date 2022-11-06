<?php

namespace App\Http\Controllers\Admin\Element;

use App\Models\Element;

class ShowController extends BaseController
{
    public function __invoke(Element $element)
    {
        return view('admin.element.show', compact('element'));
    }
}
