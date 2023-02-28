<?php

namespace App\Http\Controllers\Personal\Edit;

use App\Http\Requests\Personal\User\UpdateRequest;
use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $this->service->update($data, $user);

        return redirect()->route('personal.main.index');
    }
}
