<?php

namespace App\Http\Controllers\Admin\Character;

use App\Models\Character;

class DeleteController extends BaseController
{
    public function __invoke(Character $character)
    {
        $character->delete();
        return redirect()->route('admin.character.index');
    }
}
