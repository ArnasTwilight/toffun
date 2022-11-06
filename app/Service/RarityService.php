<?php

namespace App\Service;

use App\Models\Rarity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RarityService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/rarity', $data['image']);
            }

            Rarity::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $rarity)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/rarity', $data['image']);
            }

            $rarity->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
