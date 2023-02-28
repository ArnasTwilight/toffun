<?php

namespace App\Service;

use App\Models\Matrix;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MatrixService
{
    private $data;
    private $matrix;

    public function store($data)
    {
        $this->data = $data;

        try {
            DB::beginTransaction();

            $this->saveImage();

            Matrix::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $matrix)
    {
        $this->data = $data;
        $this->matrix = $matrix;

        try {
            DB::beginTransaction();

            $this->saveImage();

            $matrix->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/matrix', $this->data['image']);
        } elseif (isset($this->matrix['image']) && $this->matrix['image'] != 'images/placeholder/no_matrix_image.png') {
            $this->data['image'] = $this->matrix['image'];
        } else {
            $this->data['image'] = 'images/placeholder/no_matrix_image.png';
        }
    }
}
