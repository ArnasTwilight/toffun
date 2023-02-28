<?php

namespace App\Service;

use App\Models\Food;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FoodService
{
    private $data;
    private $food;

    public function store($data)
    {
        $this->data = $data;

        try {
            DB::beginTransaction();

            if (isset($data['ingredient_ids'])) {
                $ingredientIds = $data['ingredient_ids'];
                unset($data['ingredient_ids']);
            }

            $this->saveImage();

            $food = Food::firstOrCreate($data);

            if (isset($ingredientIds)) {
                $food->ingredient()->attach($ingredientIds);
            }

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

        try {
            DB::beginTransaction();

            if (isset($data['ingredient_ids'])) {
                $ingredientIds = $data['ingredient_ids'];
                unset($data['ingredient_ids']);
            }

            $this->saveImage();

            $food->update($data);

            if (isset($ingredientIds)) {
                $food->ingredients()->attach($ingredientIds);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/food', $this->data['image']);
        } elseif (isset($this->character['image']) && $this->food['image'] != 'images/placeholder/no_food_image.png') {
            $this->data['image'] = $this->food['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_food_image.png';
        }
    }

}
