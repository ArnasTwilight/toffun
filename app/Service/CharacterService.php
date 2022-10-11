<?php

namespace App\Service;

use App\Models\Character;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CharacterService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/character/avatar', $data['image']);
            } else {
                $data['image'] = 'images/character/no_character_image.jpg';
            }

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images/character/main', $data['main_image']);
            } else {
                $data['main_image'] = 'images/character/no_character_main_image.jpg';
            }

            Character::firstOrCreate($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $character)
    {
        try {
            DB::beginTransaction();

            if (isset($data['image'])) {
                $data['image'] = Storage::disk('public')->put('/images/character/avatar', $data['image']);
            } elseif ($character['image'] != 'images/character/no_character_image.jpg') {
                $data['image'] = $character['image'];
            }

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images/character/main', $data['main_image']);
            } elseif ($character['main_image'] != 'images/character/no_character_main_image.jpg') {
                $data['main_image'] = $character['main_image'];
            }

            $character->update($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
