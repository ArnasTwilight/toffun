<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function __invoke()
    {
        return view('admin.tag.index');
    }
}
