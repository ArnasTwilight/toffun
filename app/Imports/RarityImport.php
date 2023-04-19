<?php

namespace App\Imports;

use App\Models\Rarity;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RarityImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        try {
            DB::beginTransaction();

            foreach ($collection as $item) {
                if (isset($item['title']) && $item['title'] != null) {
                    Rarity::firstOrCreate([
                        'title' => $item['title'],
                        'image' => $item['image'],
                    ]);
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd('Database error - app/Imports/RarityImport.php');
        }
    }
}
