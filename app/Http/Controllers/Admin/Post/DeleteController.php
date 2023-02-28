<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        if ($post['image'] != 'images/placeholder/no_post_image.png'){
            Storage::disk('public')->delete($post['image']);
        }

        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
