<?php

namespace App\Service;

use App\Models\Relic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RelicService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/relic', $data['image']);
            } else {
                $data['image'] = 'images/relic/no_relic_image.jpg';
            }

            Relic::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $relic)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/relic', $data['image']);
            } elseif ($relic['image'] != 'images/relic/no_relic_image.jpg') {
                $data['image'] = $relic['image'];
            }

            $relic->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
