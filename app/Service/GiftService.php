<?php

namespace App\Service;

use App\Models\Gift;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GiftService
{
    private $data;
    private $gift;

    public function store($data)
    {
        $this->data = $data;
        unset($data);

        try {
            DB::beginTransaction();

            $this->saveImage();

            Gift::firstOrCreate($this->data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $gift)
    {
        $this->data = $data;
        $this->gift = $gift;
        unset($data, $gift);

        try {
            DB::beginTransaction();

            $this->saveImage();

            $this->gift->update($this->data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/gift', $this->data['image']);
        } elseif (isset($this->character['image']) && $this->gift['image'] != 'images/placeholder/no_gift_image.png') {
            $this->data['image'] = $this->gift['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_gift_image.png';
        }
    }
}
