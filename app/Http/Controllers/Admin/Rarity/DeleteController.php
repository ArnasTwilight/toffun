<?php

namespace App\Http\Controllers\Admin\Rarity;

use App\Models\Rarity;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Rarity $rarity)
    {
        if ($rarity['image'] != 'images/placeholder/no_rarity_image.png'){
            Storage::disk('public')->delete($rarity['image']);
        }

        $rarity->delete();
        return redirect()->route('admin.rarity.index');
    }
}
