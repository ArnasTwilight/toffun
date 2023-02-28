<?php

namespace App\Service;

use App\Models\Element;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ElementService
{
    private $data;
    private $element;

    public function store($data)
    {
        $this->data = $data;

        try {
            DB::beginTransaction();

            $this->saveImage();

            Element::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $element)
    {
        $this->data = $data;
        $this->element = $element;

        try {
            DB::beginTransaction();

            $this->saveImage();

            $element->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/element', $this->data['image']);
        } elseif (isset($this->character['image']) && $this->element['image'] != 'images/placeholder/no_element_image.png') {
            $this->data['image'] = $this->element['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_element_image.png';
        }
    }
}
