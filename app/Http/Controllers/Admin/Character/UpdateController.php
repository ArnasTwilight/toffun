<?php

namespace App\Http\Controllers\Admin\Character;

use App\Http\Requests\Admin\Character\UpdateRequest;
use App\Models\Character;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Character $character)
    {
        $data = $request->validated();
        $this->service->update($data, $character);
        return redirect()->route('admin.character.show', compact('character'));
    }
}
