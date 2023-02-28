<?php

namespace App\Http\Controllers\Personal\Edit;

class EditController extends BaseController
{
    public function __invoke()
    {
        $user = auth()->user();
        return view('personal.edit.index', compact('user'));
    }
}
