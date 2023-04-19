<?php

namespace App\Service;

use App\Models\Gift;
use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;

class GiftService extends ImageModule
{
    private $name = 'gift';

    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data = $this->saveImage($data, $this->name);

            Gift::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $gift)
    {
        try {
            DB::beginTransaction();

            $data = $this->updateImage($data, $this->name, $gift);

            $gift->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
