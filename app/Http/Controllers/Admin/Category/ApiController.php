<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function __invoke()
    {
        return view('admin.category.index');
    }
}
