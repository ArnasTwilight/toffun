<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Http\Controllers\Controller;
use App\Models\Spec;

class DeleteController extends Controller
{
    public function __invoke(Spec $spec)
    {
        $spec->delete();
        return redirect()->route('admin.spec.index');
    }
}
