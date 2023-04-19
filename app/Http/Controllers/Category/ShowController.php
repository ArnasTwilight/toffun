<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Category;
use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke(Category $category)
    {
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();
        $categoryPosts = $category->posts()->paginate(4);

        return view('category.show', compact('category', 'popularPosts', 'categoryPosts'));
    }
}
