<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Models\Spec;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $specList = Spec::paginate(9);
        return view('admin.spec.index', compact('specList'));
    }
}
