<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriesImport implements ToCollection, WithHeadingRow
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
                    Category::firstOrCreate(['title' => $item['title']]);
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            dd('Database error - app/Imports/CategoriesImport.php');
        }
    }
}
