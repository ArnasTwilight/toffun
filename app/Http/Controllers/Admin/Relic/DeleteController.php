<?php

namespace App\Http\Controllers\Admin\Relic;

use App\Models\Relic;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Relic $relic)
    {
        if ($relic['image'] != 'images/placeholder/no_relic_image.png'){
            Storage::disk('public')->delete($relic['image']);
        }

        $relic->delete();
        return redirect()->route('admin.relic.index');
    }
}
