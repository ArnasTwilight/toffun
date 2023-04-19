<?php

namespace App\Service;

use App\Models\Matrix;
use App\Models\MatrixBonus;
use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;

class MatrixService extends ImageModule
{
    private $data;
    private $matrixBonus;
    private $name = 'matrix';

    public function store($data)
    {
        $this->data = $data;
        unset($data);

        try {
            DB::beginTransaction();

            $this->matrixBonusData();

            $this->data = $this->saveImage($this->data, $this->name);

            $matrix = Matrix::firstOrCreate($this->data);

            $this->matrixId($matrix);

            $this->matrixBonusSave();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $matrix)
    {
        $this->data = $data;
        unset($data);

        try {
            DB::beginTransaction();

            $this->matrixBonusData();

            $this->data = $this->saveImage($this->data, $this->name, $matrix);

            $matrix->update($this->data);

            $this->matrixId($matrix);

            $this->matrixBonusSave();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function matrixBonusData()
    {
        for ($i = 0; $i != count($this->data['num']); $i++) {
            if ($this->data['num'][$i] != null) {
                $this->matrixBonus['num'][$i] = $this->data['num'][$i];
                $this->matrixBonus['bonus'][$i] = $this->data['bonus'][$i];
            }
        }

        unset($this->data['num'], $this->data['bonus']);
    }

    private function matrixBonusSave()
    {
        if ($this->matrixBonus != null) {
            for ($i = 0; $i != count($this->matrixBonus['num']); $i++) {
                MatrixBonus::firstOrCreate([
                    'quantity' => $this->matrixBonus['num'][$i],
                    'bonus' => $this->matrixBonus['bonus'][$i],
                    'matrix_id' => $this->matrixBonus['matrix_id'],
                ]);
            }
        }
    }

    private function matrixId($matrix)
    {
        if ($this->matrixBonus != null) {
            $this->matrixBonus['matrix_id'] = $matrix->id;
        }
    }
}
