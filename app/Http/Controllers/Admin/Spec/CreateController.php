<?php

namespace App\Http\Controllers\Admin\Spec;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.spec.create');
    }
}
