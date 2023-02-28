<?php

namespace App\Http\Controllers\Admin\Character;

use App\Models\Character;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Character $character)
    {
        if ($character['image'] != 'images/placeholder/no_character_image.png'){
            Storage::disk('public')->delete($character['image']);
        }

        $character->delete();
        return redirect()->route('admin.character.index');
    }
}
