<?php

namespace App\Http\Controllers\Map;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('map.index');
    }
}
