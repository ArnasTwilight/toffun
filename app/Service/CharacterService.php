<?php

namespace App\Service;

use App\Models\Character;
use App\Models\Star;
use App\Models\WeaponEffects;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CharacterService
{
    private $data;
    private $character;
    private $stars;
    private $effects;

    public function store($data)
    {
        $this->data = $data;

        try {
            DB::beginTransaction();

            $this->effects();

            $this->saveImage();

            $this->stars();

            $this->starsCreate();

            $this->character = Character::firstOrCreate($this->data);

            $this->effectsCreate();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $character, $star)
    {
        $this->data = $data;
        $this->character = $character;

        try {
            DB::beginTransaction();

            $this->effects();

            $this->saveImage();

            $this->effectsUpdate($character);

            $this->stars();

            $star->update($this->stars);

            $character->update($this->data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }


    private function saveImage()
    {
        if (isset($this->data['image'])) {
            $this->data['image'] = Storage::disk('public')->put('/images/character/avatar', $this->data['image']);
        } elseif (isset($this->character['image']) && $this->character['image'] != 'images/character/no_character_image.jpg') {
            $this->data['image'] = $this->character['image'];
        } else {
            $this->data['image'] = 'images/character/no_character_image.jpg';
        }
    }

    private function effects()
    {
        for ($i = 0; $i < $this->countEffects(); $i++) {
            if (empty($this->data['title_effect'][$i]) && empty($this->data['effect'][$i]) && !empty($this->data['id_effect'][$i])) {
                WeaponEffects::query()->where('id', $this->data['id_effect'][$i])->delete();
                unset($this->data['id_effect'][$i], $this->data['title_effect'][$i], $this->data['effect'][$i]);
            } else {
                if (!empty($this->data['title_effect'][$i])) {
                    $this->effects[$i]['title_effect'] = $this->data['title_effect'][$i];
                } else {
                    $this->effects[$i]['title_effect'] = null;
                }
                if (!empty($this->data['effect'][$i])) {
                    $this->effects[$i]['effect'] = $this->data['effect'][$i];
                } else {
                    $this->effects[$i]['effect'] = null;
                }
            }
        }
        unset($this->data['title_effect'], $this->data['effect']);
    }

    private function countEffects()
    {
        if (!empty($this->data['title_effect']) && !empty($this->data['effect']))
        {
            if (count($this->data['title_effect']) >= count($this->data['effect'])) {
                $count = count($this->data['title_effect']);
            } else {
                $count = count($this->data['effect']);
            }
            return $count;
        }
        return 0;
    }

    private function stars()
    {
        for ($i = 1; $i <= count($this->data['C']); $i++) {
            $this->stars['C' . $i] = $this->data['C'][$i];
        }
        unset($this->data['C']);
    }

    private function starsCreate()
    {
        $star = Star::firstOrCreate($this->stars);
        $this->data['stars_id'] = $star->id;
    }

    private function effectsCreate()
    {
        for ($i = 0; $i < count($this->effects); $i++) {
            $this->effects[$i]['character_id'] = $this->character->id;
            WeaponEffects::firstOrCreate($this->effects[$i]);
        }
    }

    private function effectsUpdate($character)
    {
        for ($i = 0; $i < WeaponEffects::where('character_id', $character->id)->count(); $i++) {
            $this->effects[$i]['character_id'] = $character->id;
            WeaponEffects::where('id', $this->data['id_effect'][$i])->update($this->effects[$i]);
            unset($this->effects[$i]);
        }

        if (!empty($this->effects)) {
            foreach ($this->effects as $effect) {
                $effect['character_id'] = $character->id;
                WeaponEffects::firstOrCreate($effect);
            }
        }

        unset($this->data['id_effect'], $this->data['title_effect'], $this->data['effect']);
    }
}
