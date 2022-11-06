<?php

namespace App\Http\Controllers\Admin\Element;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.element.create');
    }
}
