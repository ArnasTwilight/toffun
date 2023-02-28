<?php

namespace App\Service;

use App\Models\Element;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService
{
    private $data;
    private $user;

    public function update($data, $user)
    {
        $this->data = $data;
        $this->user = $user;

        try {
            DB::beginTransaction();

            $this->saveImage();

            $user->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/user', $this->data['image']);
        } elseif (isset($this->user['image']) && $this->user['image'] != 'images/placeholder/no_user_image.png') {
            $this->data['image'] = $this->user['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_user_image.png';
        }
    }
}
