<?php

namespace App\Service\Modules;

use Illuminate\Support\Facades\Storage;

class ImageModule
{
    public function saveImage($data, $name, $object = [])
    {
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images/' . $name, $data['image']);
        } elseif (isset($data['image']) && $object['image'] != 'images/placeholder/no_' . $name . '_image.png') {
            $data['image'] = $object['image'];
        } else {
            $data['image'] = 'images/placeholder/no_' . $name . '_image.png';
        }

        return $data;
    }

    public function updateImage($data, $name, $object)
    {
        if (isset($data['image'])) {
            if ($object['image'] != 'images/placeholder/no_gift_image.png') {
                Storage::disk('public')->delete($object['image']);
            }
            $data['image'] = Storage::disk('public')->put('/images/' . $name, $data['image']);
        }

        return $data;
    }
}
