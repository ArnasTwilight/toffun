<?php

namespace App\Http\Controllers\Admin\Element;

use App\Http\Controllers\Controller;
use App\Models\Element;

class DeleteController extends Controller
{
    public function __invoke(Element $element)
    {
        $element->delete();
        return redirect()->route('admin.element.index');
    }
}
