<?php

namespace App\Http\Controllers\Admin\Element;

use App\Http\Controllers\Controller;
use App\Models\Element;

class EditController extends Controller
{
    public function __invoke(Element $element)
    {
        return view('admin.element.edit', compact('element'));
    }
}
