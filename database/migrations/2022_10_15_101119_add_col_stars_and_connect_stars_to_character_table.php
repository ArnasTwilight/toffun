<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColStarsAndConnectStarsToCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('character', function (Blueprint $table) {
            $table->unsignedBigInteger('stars_id')->nullable()->after('matrix_id');

            $table->index('stars_id', 'character_stars_idx');
            $table->foreign('stars_id', 'character_stars_fk')->on('stars')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('character', function (Blueprint $table) {
            $table->dropForeign('character_stars_fk');
            $table->dropIndex('character_stars_idx');

            $table->dropColumn('stars_id');
        });
    }
}
