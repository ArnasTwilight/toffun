<?php

namespace App\Http\Controllers\Admin\Element;

use App\Models\Element;

class EditController extends BaseController
{
    public function __invoke(Element $element)
    {
        return view('admin.element.edit', compact('element'));
    }
}
