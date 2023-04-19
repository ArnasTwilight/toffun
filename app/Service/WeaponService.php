<?php

namespace App\Service;

use App\Models\Weapon;
use App\Models\WeaponAttacks;
use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;

class WeaponService extends ImageModule
{
    private $name = 'weapon';
    private $data;
    private $weaponAttacks;
    private $idWeaponAttacks;

    public function store($data)
    {
        $this->data = $data;
        unset($data);

        try {
            DB::beginTransaction();

            $this->data = $this->saveImage($this->data, $this->name);

            $this->saveImageChargeShatter();

            $this->dataWeaponAttacks();

            $weapon = Weapon::firstOrCreate($this->data);

            $this->saveWeaponAttacks($weapon['id']);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $weapon)
    {
        $this->data = $data;
        unset($data);

        try {
            DB::beginTransaction();

            $this->data = $this->saveImage($this->data, $this->name, $weapon);

            $this->saveImageChargeShatter();

            $this->dataWeaponAttacks();

            $this->comparisonWeaponAttacks($weapon);

            $this->deleteWeaponAttacks($weapon);

            $weapon->update($this->data);

            $this->updateWeaponAttacks($weapon);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImageChargeShatter()
    {
        $path = 'images/' . $this->name . '/stats/';

        if ($this->data['charge'] <= 7) {
            $this->data['charge_img'] = $path . 'B.png';
        } elseif ($this->data['charge'] >= 11) {
            $this->data['charge_img'] = $path . 'S.png';
        } else {
            $this->data['charge_img'] = $path . 'A.png';
        }

        if ($this->data['shatter'] <= 7) {
            $this->data['shatter_img'] = $path . 'B.png';
        } elseif ($this->data['shatter'] >= 11) {
            $this->data['shatter_img'] = $path . 'S.png';
        } else {
            $this->data['shatter_img'] = $path . 'A.png';
        }
    }

    private function dataWeaponAttacks()
    {
        if (isset($this->data['type'])) {
            for ($i = 0; $i != count($this->data['type']); $i++) {
                if (isset($this->data['id_attacks'], $this->data['id_attacks'][$i]) && $this->data['id_attacks'][$i] != null) {
                    $this->weaponAttacks['id'][$i] = $this->data['id_attacks'][$i];
                }
                $this->weaponAttacks['type'][$i] = $this->data['type'][$i];
                $this->weaponAttacks['title'][$i] = $this->data['title_attacks'][$i];
                $this->weaponAttacks['description'][$i] = $this->data['description'][$i];
            }
            unset($this->data['type'], $this->data['title_attacks'], $this->data['description'], $this->data['id_attacks']);
        }
    }

    private function saveWeaponAttacks($weaponId)
    {
        if ($this->weaponAttacks != null) {
            for ($i = 0; $i != count($this->weaponAttacks['type']); $i++) {
                WeaponAttacks::firstOrCreate([
                    'type' => $this->weaponAttacks['type'][$i],
                    'title' => $this->weaponAttacks['title'][$i],
                    'description' => $this->weaponAttacks['description'][$i],
                    'weapon_id' => $weaponId,
                ]);
            }
        }
    }

    private function deleteWeaponAttacks($weapon)
    {
        foreach ($weapon->weaponAttacks as $key => $item) {
            if (!isset($this->idWeaponAttacks[$key])) {
                $item->delete();
            }
        }
    }

    private function comparisonWeaponAttacks($weapon)
    {
        for ($i = 0; $i != count($weapon->weaponAttacks); $i++) {
            for ($j = 0; $j != count($this->weaponAttacks['id']); $j++) {
                if ($weapon->weaponAttacks[$i]->id == $this->weaponAttacks['id'][$j]) {
                    $this->idWeaponAttacks[$i] = $weapon->weaponAttacks[$i]->id;
                    break;
                }
            }
        }
    }

    private function updateWeaponAttacks($weapon)
    {
        for ($i = 0; $i != count($this->weaponAttacks['title']); $i++) {
            if (isset($this->data['id_attacks'], $this->data['id_attacks'][$i]) && $this->data['id_attacks'][$i] != null) {
                $weapon->weaponAttacks()->updateOrCreate([
                    'id' => $this->weaponAttacks['id'][$i],
                    'type' => $this->weaponAttacks['type'][$i],
                    'title' => $this->weaponAttacks['title'][$i],
                    'description' => $this->weaponAttacks['description'][$i],
                    'weapon_id' => $weapon->id,
                ]);
            } else {
                $weapon->weaponAttacks()->updateOrCreate([
                    'type' => $this->weaponAttacks['type'][$i],
                    'title' => $this->weaponAttacks['title'][$i],
                    'description' => $this->weaponAttacks['description'][$i],
                    'weapon_id' => $weapon->id,
                ]);
            }
        }
    }
}
