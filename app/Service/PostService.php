<?php

namespace App\Service;

use App\Models\Post;
use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;

class PostService extends ImageModule
{
    private $data;
    private $post;
    private $tagIds;
    private $name = 'post';

    public function store($data)
    {
        $this->data = $data;
        unset($data);

        try {
            DB::beginTransaction();

            $this->tagIds();

            $this->saveImage($this->data, $this->name);

            $this->data['user_id'] = auth()->user()->id;

            $this->post = Post::firstOrCreate($this->data);

            $this->tagsSync();

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
        unset($data, $post);

        try {
            DB::beginTransaction();

            $this->tagIds();

            $this->saveImage($this->data, $this->name, $this->post);

            $this->post->update($this->data);

            $this->tagsSync();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function tagIds()
    {
        if (isset($this->data['tag_ids'])) {
            $this->tagIds = $this->data['tag_ids'];
            unset($this->data['tag_ids']);
        }
    }

    private function tagsSync()
    {
        if (isset($this->tagIds)) {
            $this->post->tags()->sync($this->tagIds);
        }
    }
}
