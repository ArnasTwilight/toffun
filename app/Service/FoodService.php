<?php

namespace App\Service;

use App\Models\Food;
use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;

class FoodService extends ImageModule
{
    private $data;
    private $ingredientIds;
    private $food;
    private $name = 'food';

    public function store($data)
    {
        $this->data = $data;
        unset($data);

        try {
            DB::beginTransaction();

            $this->ingredientIds();

            $this->data = $this->saveImage($this->data, $this->name);

            $this->food = Food::firstOrCreate($this->data);

            $this->ingredientsSync();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $food)
    {
        $this->data = $data;
        $this->food = $food;
        unset($data, $food);

        try {
            DB::beginTransaction();

            $this->ingredientIds();

            $this->data = $this->saveImage($this->data, $this->name, $this->food);

            $this->food->update($this->data);

            $this->ingredientsSync();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function ingredientIds()
    {
        if (isset($this->data['ingredient_ids'])) {
            $this->ingredientIds = $this->data['ingredient_ids'];
            unset($this->data['ingredient_ids']);
        }
    }

    private function ingredientsSync()
    {
        if (isset($this->ingredientIds)) {
            $this->food->ingredients()->sync($this->ingredientIds);
        }
    }
}
