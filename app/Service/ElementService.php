<?php

namespace App\Service;

use App\Models\Element;
use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;

class ElementService extends ImageModule
{
    private $name = 'element';

    public function store($data)
    {
        try {
            DB::beginTransaction();

            $data = $this->saveImage($data, $this->name);

            Element::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $element)
    {
        try {
            DB::beginTransaction();

            $data = $this->saveImage($data, $this->name, $element);

            $element->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
