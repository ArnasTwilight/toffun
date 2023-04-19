<?php

namespace App\Imports;

use App\Models\Weapon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class WeaponImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        try {
            DB::beginTransaction();

            foreach ($collection as $item) {
                if (isset($item['title']) && $item['title'] != null)
                {
                    Weapon::firstOrCreate([
                    'title' => $item['title'],
                    'image' => $item['image'],
                    'shatter' => $item['shatter'],
                    'charge' => $item['charge'],
                    'element_id' => $item['element_id'],
                    'rarity_id' => $item['rarity_id'],
                ]);
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd('Database error - app/Imports/WeaponImport.php');
        }
    }
}
