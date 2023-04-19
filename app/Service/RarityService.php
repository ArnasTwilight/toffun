<?php

namespace App\Service;

use App\Models\Rarity;
use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;

class RarityService extends ImageModule
{
    private $name = 'rarity';

    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data = $this->saveImage($data, $this->name);

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

            $data = $this->saveImage($data, $this->name, $rarity);

            $rarity->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

}
