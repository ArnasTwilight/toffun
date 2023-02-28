<?php

namespace App\Service;

use App\Models\Spec;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SpecService
{
    private $data;
    private $spec;

    public function store($data)
    {
        $this->data = $data;

        try {
            DB::beginTransaction();

            $this->saveImage();

            Spec::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $spec)
    {
        $this->data = $data;
        $this->spec = $spec;

        try {
            DB::beginTransaction();

            $this->saveImage();

            $spec->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/spec', $this->data['image']);
        } elseif (isset($this->spec['image']) && $this->spec['image'] != 'images/placeholder/no_spec_image.png') {
            $this->data['image'] = $this->spec['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_spec_image.png';
        }
    }
}
