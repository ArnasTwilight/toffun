<?php

namespace App\Service;

use App\Models\Rarity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RarityService
{
    private $data;
    private $rarity;

    public function store($data)
    {
        $this->data = $data;

        try {
            DB::beginTransaction();

            $this->saveImage();

            Rarity::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $rarity)
    {
        $this->data = $data;
        $this->rarity = $rarity;

        try {
            DB::beginTransaction();

            $this->saveImage();

            $rarity->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/rarity', $this->data['image']);
        } elseif (isset($this->rarity['image']) && $this->rarity['image'] != 'images/placeholder/no_rarity_image.png') {
            $this->data['image'] = $this->rarity['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_rarity_image.png';
        }
    }
}
