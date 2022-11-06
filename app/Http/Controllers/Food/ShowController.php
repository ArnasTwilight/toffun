<?php

namespace App\Http\Controllers\Food;

use App\Http\Controllers\Controller;
use App\Models\Food;

class ShowController extends Controller
{
    public function __invoke(Food $food)
    {
        return view('food.show', compact('food'));
    }
}
