<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    private $data;
    private $post;

    public function store($data)
    {
        $this->data = $data;

        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $this->saveImage();

            $data['user_id'] = auth()->user()->id;

            $post = Post::firstOrCreate($data);

            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        $this->data = $data;
        $this->post = $post;

        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $this->saveImage();

            $post->update($data);

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/post', $this->data['image']);
        } elseif (isset($this->post['image']) && $this->post['image'] != 'images/placeholder/no_post_image.png') {
            $this->data['image'] = $this->post['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_post_image.png';
        }
    }
}
