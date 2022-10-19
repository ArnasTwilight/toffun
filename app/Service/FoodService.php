<?php

namespace App\Service;

use App\Models\Food;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FoodService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['ingredient_ids'])) {
                $ingredientIds = $data['ingredient_ids'];
                unset($data['ingredient_ids']);
            }

//            if (isset($data['image'])) {
//                $data['image'] = Storage::disk('public')->put('/images/food', $data['image']);
//            } else {
//                $data['image'] = 'images/food/no_food_image.jpg';
//            }


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
        try {
            DB::beginTransaction();

            if (isset($data['ingredient_ids'])) {
                $ingredientIds = $data['ingredient_ids'];
                unset($data['ingredient_ids']);
            }

//            if (isset($data['image'])) {
//                $data['image'] = Storage::disk('public')->put('/images/food', $data['image']);
//            } elseif ($food['image'] != 'images/food/no_food_image.jpg') {
//                $data['image'] = $food['image'];
//            }

            $food->update($data);

            if (isset($ingredientIds)) {
                $food->ingredient()->attach($ingredientIds);
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
