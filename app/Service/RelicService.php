<?php

namespace App\Service;

use App\Models\Relic;
use App\Models\Star;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RelicService
{
    private $data;
    private $relic;

    public function store($data)
    {
        $this->data = $data;

        try {
            DB::beginTransaction();

            $this->saveImage();

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
        $this->data = $data;
        $this->relic = $relic;

        try {
            DB::beginTransaction();

            $this->saveImage();

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

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/relic', $this->data['image']);
        } elseif (isset($this->relic['image']) && $this->relic['image'] != 'images/placeholder/no_relic_image.png') {
            $this->data['image'] = $this->relic['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_relic_image.png';
        }
    }
}
