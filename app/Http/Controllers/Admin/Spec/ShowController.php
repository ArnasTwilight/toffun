<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Models\Spec;

class ShowController extends BaseController
{
    public function __invoke(Spec $spec)
    {
        return view('admin.spec.show', compact('spec'));
    }
}
