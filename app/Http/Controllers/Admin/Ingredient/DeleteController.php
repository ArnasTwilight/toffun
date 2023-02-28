<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Models\Ingredient;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Ingredient $ingredient)
    {
        if ($ingredient['image'] != 'images/placeholder/no_ingredient_image.png'){
            Storage::disk('public')->delete($ingredient['image']);
        }

        $ingredient->delete();
        return redirect()->route('admin.ingredient.index');
    }
}
