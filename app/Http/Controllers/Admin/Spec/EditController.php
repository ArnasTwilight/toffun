<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Http\Controllers\Controller;
use App\Models\Spec;

class EditController extends Controller
{
    public function __invoke(Spec $spec)
    {
        return view('admin.spec.edit', compact('spec'));
    }
}
