<?php

namespace App\Http\Controllers\Admin\Spec;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Spec;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Spec $spec)
    {
        $data = $request->validated();
        $spec->update($data);
        return redirect()->route('admin.spec.show', compact('spec'));
    }
}
