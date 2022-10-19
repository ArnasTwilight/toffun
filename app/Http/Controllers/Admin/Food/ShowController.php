<?php

namespace App\Http\Controllers\Admin\Food;

use App\Models\Food;

class ShowController extends BaseController
{
    public function __invoke(Food $food)
    {
        return view('admin.food.show', compact('food'));
    }
}
