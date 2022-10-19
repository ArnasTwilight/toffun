<?php

namespace App\Service;

use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IngredientService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/ingredient', $data['image']);
            } else {
                $data['image'] = 'images/ingredient/no_ingredient_image.jpg';
            }

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

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/ingredient', $data['image']);
            } elseif ($ingredient['image'] != 'images/ingredient/no_ingredient_image.jpg') {
                $data['image'] = $ingredient['image'];
            }

            $ingredient->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
