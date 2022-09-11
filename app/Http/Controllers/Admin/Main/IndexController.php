<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->get()->take(5);
        $postsCount = Post::all()->count();
        $usersCount = User::all()->count();

        return view('admin.main.index', compact ('posts', 'postsCount', 'usersCount'));
    }
}
