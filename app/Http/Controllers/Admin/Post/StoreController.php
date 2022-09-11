<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (isset($data['tag_ids']))
        {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }

        $post = Post::firstOrCreate($data);

        if (isset($tagIds))
        {
            $post->tags()->attach($tagIds);
        }

        return redirect()->route('admin.post.index');
    }
}
