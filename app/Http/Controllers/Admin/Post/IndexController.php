<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Str;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(9);
        return view('admin.post.index', compact('posts'));
    }
}
