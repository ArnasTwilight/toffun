<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Models\Food;

class IndexController extends Controller
{
    public function __invoke()
    {
        $food = Food::all();
        return view('food.index', compact('food'));
    }
}
