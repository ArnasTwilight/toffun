<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Models\Spec;

class DeleteController extends BaseController
{
    public function __invoke(Spec $spec)
    {
        $spec->delete();
        return redirect()->route('admin.spec.index');
    }
}
