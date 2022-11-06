<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Models\Spec;

class EditController extends BaseController
{
    public function __invoke(Spec $spec)
    {
        return view('admin.spec.edit', compact('spec'));
    }
}
