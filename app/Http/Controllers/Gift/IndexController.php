<?php

namespace App\Http\Controllers\Gift;

use App\Http\Controllers\Controller;
use App\Models\Gift;

class IndexController extends Controller
{
    public function __invoke()
    {
        $gifts = Gift::all();
        return view('gift.index', compact('gifts'));
    }
}
