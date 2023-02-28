<?php

namespace App\Http\Controllers\Admin\Food;

use App\Models\Food;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Food $food)
    {
        if ($food['image'] != 'images/placeholder/no_food_image.png'){
            Storage::disk('public')->delete($food['image']);
        }

        $food->delete();
        return redirect()->route('admin.food.index');
    }
}
