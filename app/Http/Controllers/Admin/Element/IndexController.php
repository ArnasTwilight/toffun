<?php

namespace App\Http\Controllers\Admin\Element;

use App\Models\Element;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $elements = Element::paginate(9);
        return view('admin.element.index', compact('elements'));
    }
}
