<?php

namespace App\Http\Controllers\Character;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\MatrixBonus;
use App\Models\Post;
use App\Models\WeaponEffects;

class ShowController extends Controller
{
    public function __invoke(Character $character)
    {
        $popularPosts = Post::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();

        return view('character.show', compact('character', 'popularPosts'));
    }
}
