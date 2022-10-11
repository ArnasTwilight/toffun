<?php

namespace App\Http\Controllers\Admin\Element;

use App\Http\Controllers\Controller;
use App\Models\Element;

class ShowController extends Controller
{
    public function __invoke(Element $element)
    {
        return view('admin.element.show', compact('element'));
    }
}
