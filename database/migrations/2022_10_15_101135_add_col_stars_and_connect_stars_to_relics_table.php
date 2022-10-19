<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColStarsAndConnectStarsToRelicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relics', function (Blueprint $table) {
            $table->unsignedBigInteger('stars_id')->nullable()->after('rarity_id');

            $table->index('stars_id', 'relics_stars_idx');
            $table->foreign('stars_id', 'relics_stars_fk')->on('stars')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relics', function (Blueprint $table) {
            $table->dropForeign('relics_stars_fk');
            $table->dropIndex('relics_stars_idx');

            $table->dropColumn('stars_id');
        });
    }
}
