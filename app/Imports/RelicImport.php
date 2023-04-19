<?php

namespace App\Imports;

use App\Models\Relic;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RelicImport implements ToCollection, WithHeadingRow
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
                    Relic::firstOrCreate([
                    'title' => $item['title'],
                    'image' => $item['image'],
                    'cooldown' => $item['cooldown'],
                    'description' => $item['description'],
                    'rarity_id' => $item['rarity_id'],
                ]);
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd('Database error - app/Imports/RelicImport.php');
        }
    }
}
