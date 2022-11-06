<?php

namespace App\Service;

use App\Models\Relic;
use App\Models\Star;
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

            for ($i = 1; $i <= 5; $i++) {
                $stars['C' . $i] = $data['C' . $i];
                unset($data['C' . $i]);
            }

            $star = Star::firstOrCreate($stars);
            $data['stars_id'] = $star->id;

            Relic::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $relic, $star)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/relic', $data['image']);
            } elseif ($relic['image'] != 'images/relic/no_relic_image.jpg') {
                $data['image'] = $relic['image'];
            }

            for ($i = 1; $i <= 5; $i++) {
                $stars['C' . $i] = $data['C' . $i];
                unset($data['C' . $i]);
            }

            if (isset($star))
            {
                $star->update($stars);
            } else {
                $star = Star::firstOrCreate($stars);
                $data['stars_id'] = $star->id;
            }

            $relic->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
