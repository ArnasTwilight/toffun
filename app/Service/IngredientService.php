<?php

namespace App\Service;

use App\Models\Ingredient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IngredientService
{
    private $data;
    private $ingredient;

    public function store($data)
    {
        $this->data = $data;

        try {
            DB::beginTransaction();

            $this->saveImage();

            Ingredient::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $ingredient)
    {
        $this->data = $data;
        $this->ingredient = $ingredient;

        try {
            DB::beginTransaction();

            $this->saveImage();

            $ingredient->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/ingredient', $this->data['image']);
        } elseif (isset($this->ingredient['image']) && $this->ingredient['image'] != 'images/placeholder/no_ingredient_image.png') {
            $this->data['image'] = $this->ingredient['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_ingredient_image.png';
        }
    }
}
