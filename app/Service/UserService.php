<?php

namespace App\Service;

use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;

class UserService extends ImageModule
{
    private $name = 'user';

    public function update($data, $user)
    {
        try {
            DB::beginTransaction();

            $data = $this->saveImage($data, $this->name);

            $user->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
