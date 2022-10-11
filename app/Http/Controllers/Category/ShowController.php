<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Category;

class ShowController extends BaseController
{
    public function __invoke(Category $category)
    {
        return view('category.show', compact('category'));
    }
}
