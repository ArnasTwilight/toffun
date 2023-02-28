<?php

namespace App\Http\Controllers\Personal\Edit;

use App\Http\Requests\Personal\User\ChangepassRequest;
use App\Models\User;

class ChangepassController extends BaseController
{
    public function __invoke(ChangepassRequest $request, User $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('personal.main.index');
    }
}
