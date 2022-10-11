<?php

namespace App\Http\Controllers\Admin\Element;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Element\StoreRequest;
use App\Models\Element;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Element::firstOrCreate($data);
        return redirect()->route('admin.element.index');
    }
}
