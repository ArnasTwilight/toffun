<?php

namespace App\Http\Controllers\Admin\Character;

use App\Http\Requests\Admin\Character\UpdateRequest;
use App\Models\Character;
use App\Models\Star;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Character $character)
    {
        $data = $request->validated();
        $star = Star::query()->find($character->stars_id);
        $this->service->update($data, $character, $star);
        return redirect()->route('admin.character.show', compact('character'));
    }
}
