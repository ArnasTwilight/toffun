<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use DateInterval;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::orderBy('updated_at', 'DESC')->get()->take(5);
        $postsCount = Post::count();
        $usersCount = User::count();
        $newUser = User::orderBy('updated_at', 'DESC')->get()->take(4);
        $newUserCount = User::all()->where('created_at', '>=', date_sub(NOW(), DateInterval::createFromDateString('7 day'))->format('Y-m-d H:m:i'))->count();
        $load = $this->CPUload();
        $characterCount = Character::count();
        $likesCount = Like::count();
        $comments = Comment::orderBy('updated_at', 'DESC')->get()->take(4);;
        $commentsCount = Comment::count();

        return view('admin.main.index', compact(
            'posts',
            'postsCount',
            'usersCount',
            'newUser',
            'newUserCount',
            'characterCount',
            'likesCount',
            'commentsCount',
            'comments',
            'load'));
    }

    private function CPUload()
    {
        $_ENV['typeperfCounter'] = '\processor(_total)\% processor time';
        exec('typeperf -sc 1 "' . $_ENV['typeperfCounter'] . '"', $p);
        $line = explode(',', $p[2]);
        return number_format(trim($line[1], '"'));
    }
}
