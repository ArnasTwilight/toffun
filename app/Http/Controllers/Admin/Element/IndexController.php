<?php

namespace App\Http\Controllers\Admin\Element;

use App\Http\Controllers\Controller;
use App\Models\Element;

class IndexController extends Controller
{
    public function __invoke()
    {
        $elements = Element::paginate(9);
        return view('admin.element.index', compact('elements'));
    }
}
