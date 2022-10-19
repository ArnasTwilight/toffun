<?php

namespace App\Http\Controllers\Admin\Food;

use App\Http\Requests\Admin\Food\UpdateRequest;
use App\Models\Food;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Food $food)
    {
        $data = $request->validated();
        $this->service->update($data, $food);

        return redirect()->route('admin.food.show', compact('food'));
    }
}
