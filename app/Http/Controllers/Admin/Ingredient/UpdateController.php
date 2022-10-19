<?php

namespace App\Http\Controllers\Admin\Ingredient;

use App\Http\Requests\Admin\Ingredient\UpdateRequest;
use App\Models\Ingredient;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Ingredient $ingredient)
    {
        $data = $request->validated();
        $this->service->update($data, $ingredient);

        return redirect()->route('admin.ingredient.show', compact('ingredient'));
    }
}
