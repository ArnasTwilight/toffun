<?php

namespace App\Http\Controllers\Admin\Food;

use App\Models\Food;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $food = Food::paginate(9);
        return view('admin.food.index', compact('food'));
    }
}
