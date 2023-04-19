<?php

namespace App\Imports;

use App\Models\Character;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CharacterImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        try {
            DB::beginTransaction();

            foreach ($collection as $item) {
                if (isset($item['name']) && $item['name'] != null) {
                    Character::firstOrCreate([
                        'name' => $item['name'],
                        'image' => $item['image'],
                        'trait_1' => $item['trait_1'],
                        'trait_2' => $item['trait_2'],
                        'spec_id' => $item['spec_id'],
                        'rarity_id' => $item['rarity_id'],
                        'weapon_id' => $item['weapon_id'],
                        'matrix_id' => $item['matrix_id'],
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd('Database error - app/Imports/CharacterImport.php');
        }
    }
}
