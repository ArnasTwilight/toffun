<?php

namespace App\Service;

use App\Models\Relic;
use App\Models\Star;
use App\Service\Modules\ImageModule;
use Illuminate\Support\Facades\DB;

class RelicService extends ImageModule
{
    private $name = 'relic';
    private $stars;
    private $starsIds;
    private $starsUpdate;
    private $data;

    public function store($data)
    {
        try {
            DB::beginTransaction();

            $this->setData($data);

            $this->starsData();

            $this->starsCreate();

            $this->data = $this->saveImage($this->data, $this->name);

            $relic = Relic::create($this->data);

            $this->starsSync($relic);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $relic)
    {
        try {
            DB::beginTransaction();

            $this->setData($data);

            $this->starsData();

            $this->starsComparison($relic);

            $this->starsDelete($relic);

            $this->starsUpdate();

            $this->starsCreate();

            $this->data = $this->updateImage($this->data, $this->name, $relic);

            $relic->update($this->data);

            $this->starsSync($relic);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    private function starsData()
    {
        if (isset($this->data['star'])) {
            foreach ($this->data['star'] as $key => $star) {
                if (isset($this->data['id_star'][$key])) {
                    $this->starsUpdate[$key]['id'] = $this->data['id_star'][$key];
                    $this->starsUpdate[$key]['star'] = $this->data['star'][$key];
                    $this->starsUpdate[$key]['effect'] = $this->data['effect'][$key];
                } else {
                    $this->stars[$key]['star'] = $this->data['star'][$key];
                    $this->stars[$key]['effect'] = $this->data['effect'][$key];
                }
            }
            unset($this->data['star'], $this->data['effect'], $this->data['id_star']);
        }
    }

    private function starsCreate()
    {
        if (isset($this->stars)) {
            foreach ($this->stars as $star) {
                $stars[] = Star::create([
                    'star' => $star['star'],
                    'effect' => $star['effect'],
                ]);
            }
            foreach ($stars as $star) {
                $this->starsIds[] = $star->id;
            }
            unset($this->stars);
        }
    }

    private function starsComparison($relic)
    {
        if (isset($this->stars)) {
            foreach ($relic->stars as $key => $star) {
                foreach ($this->starsUpdate as $item) {
                    if ($star->id == $item['id']) {
                        $this->starsIds[$key] = $star->id;
                        break;
                    }
                }
            }
        }
    }

    private function starsDelete($relic)
    {
        foreach ($relic->stars as $key => $item) {
            if (!empty($this->starsIds) && !isset($this->starsIds[$key])) {
                $item->delete();
            }
        }
    }

    private function starsUpdate()
    {
        if (isset($this->starsUpdate)) {
            foreach ($this->starsUpdate as $star) {
                Star::where('id', '=', $star['id'])->update([
                    'star' => $star['star'],
                    'effect' => $star['effect'],
                ]);
                $this->starsIds[] = $star['id'];
            }
        }
    }

    private function starsSync($relic)
    {
        if (isset($this->starsIds)) {
            $relic->stars()->sync($this->starsIds);
        }
    }

    private function setData($data)
    {
        $this->data = $data;
        unset($data);
    }
}
