<?php

namespace App\Service;

use App\Models\Weapon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WeaponService
{
    private $data;
    private $weapon;

    public function store($data)
    {
        $this->data = $data;

        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/weapon', $data['image']);
            } else {
                $data['image'] = 'images/weapon/no_weapon_image.png';
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
        $this->data = $data;
        $this->weapon = $weapon;

        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/weapon', $data['image']);
            } elseif ($weapon['image'] != 'images/weapon/no_weapon_image.png') {
                $data['image'] = $weapon['image'];
            }

            $weapon->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/weapon', $this->data['image']);
        } elseif (isset($this->weapon['image']) && $this->weapon['image'] != 'images/placeholder/no_weapon_image.png') {
            $this->data['image'] = $this->weapon['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_weapon_image.png';
        }
    }
}
