<?php

namespace App\Http\Controllers\Admin\Gift;

use App\Models\Gift;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Gift $gift)
    {
        if ($gift['image'] != 'images/placeholder/no_gift_image.png'){
            Storage::disk('public')->delete($gift['image']);
        }

        $gift->delete();
        return redirect()->route('admin.gift.index');
    }
}
