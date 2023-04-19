<?php

namespace App\Service;

use App\Models\Spec;
use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SpecService extends ImageModule
{
    private $name = 'spec';

    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data = $this->saveImage($data, $this->name);

            Spec::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $spec)
    {
        try {
            DB::beginTransaction();

            $data = $this->saveImage($data, $this->name, $spec);

            $spec->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
