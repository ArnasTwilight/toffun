<?php

namespace App\Http\Controllers\Admin\Matrix;

use App\Http\Requests\Admin\Matrix\UpdateRequest;
use App\Models\Matrix;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Matrix $matrix)
    {
        $data = $request->validated();
        $this->service->update($data, $matrix);

        return redirect()->route('admin.matrix.show', compact('matrix'));
    }
}
