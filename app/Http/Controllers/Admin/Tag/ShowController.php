<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Tag\TagResource;
use App\Models\Tag;

class ShowController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return new TagResource($tag);
    }
}
