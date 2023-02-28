<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Models\Spec;
use Illuminate\Support\Facades\Storage;

class DeleteController extends BaseController
{
    public function __invoke(Spec $spec)
    {
        if ($spec['image'] != 'images/placeholder/no_spec_image.png'){
            Storage::disk('public')->delete($spec['image']);
        }

        $spec->delete();
        return redirect()->route('admin.spec.index');
    }
}
