<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Spec;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Spec::firstOrCreate($data);
        return redirect()->route('admin.spec.index');
    }
}
