<?php

namespace App\Service;

use App\Models\Ingredient;
use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;

class IngredientService extends ImageModule
{
    private $name = 'ingredient';

    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data = $this->saveImage($data, $this->name);

            Ingredient::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $ingredient)
    {
        try {
            DB::beginTransaction();

            $data = $this->saveImage($data, $this->name, $ingredient);

            $ingredient->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
