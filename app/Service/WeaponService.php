<?php

namespace App\Service;

use App\Models\Weapon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WeaponService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/weapon', $data['image']);
            } else {
                $data['image'] = 'images/weapon/no_image.jpg';
            }

            Weapon::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $weapon)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/weapon', $data['image']);
            } else {
                $data['image'] = 'images/weapon/no_image.jpg';
            }

            $weapon->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
