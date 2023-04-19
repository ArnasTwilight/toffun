<?php

namespace App\Console\Commands;

use App\Imports\CategoriesImport;
use App\Imports\CharacterImport;
use App\Imports\ElementImport;
use App\Imports\MatrixImport;
use App\Imports\PostImport;
use App\Imports\RarityImport;
use App\Imports\RelicImport;
use App\Imports\SpecImport;
use App\Imports\TagsImport;
use App\Imports\UserImport;
use App\Imports\WeaponImport;
use App\Models\User;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get data from Excel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        ini_set('memory_limit', '-1');

        Excel::import(new CategoriesImport(), public_path('excel/post/categories.xlsx'));
        Excel::import(new TagsImport(), public_path('excel/post/tags.xlsx'));
        Excel::import(new PostImport(), public_path('excel/post/posts.xlsx'));

        Excel::import(new RarityImport(), public_path('excel/rarity.xlsx'));
        Excel::import(new ElementImport(), public_path('excel/element.xlsx'));

        Excel::import(new SpecImport(), public_path('excel/spec.xlsx'));
        Excel::import(new RelicImport(), public_path('excel/relic.xlsx'));

        Excel::import(new MatrixImport(), public_path('excel/character/matrix.xlsx'));
        Excel::import(new WeaponImport(), public_path('excel/character/weapon.xlsx'));
        Excel::import(new CharacterImport(), public_path('excel/character/character.xlsx'));

        Excel::import(new UserImport(), public_path('excel/user.xlsx'));

        dd('Success');
    }
}
