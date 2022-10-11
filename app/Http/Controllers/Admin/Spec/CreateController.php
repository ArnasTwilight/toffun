<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.spec.create');
    }
}
