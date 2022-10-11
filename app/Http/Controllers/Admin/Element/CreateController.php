<?php

namespace App\Http\Controllers\Admin\Element;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.element.create');
    }
}
