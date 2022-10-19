<?php

namespace App\Http\Controllers\Admin\Food;

use App\Models\Food;

class DeleteController extends BaseController
{
    public function __invoke(Food $food)
    {
        $food->delete();
        return redirect()->route('admin.food.index');
    }
}
