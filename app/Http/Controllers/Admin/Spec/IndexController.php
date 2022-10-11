<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Http\Controllers\Controller;
use App\Models\Spec;

class IndexController extends Controller
{
    public function __invoke()
    {
        $specList = Spec::paginate(9);
        return view('admin.spec.index', compact('specList'));
    }
}
