<?php

namespace App\Service;

use App\Models\Matrix;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MatrixService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/matrices', $data['image']);
            } else {
                $data['image'] = 'images/matrices/no_image.jpg';
            }

            Matrix::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $matrix)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/matrices', $data['image']);
            } else {
                $data['image'] = 'images/matrices/no_image.jpg';
            }

            $matrix->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
