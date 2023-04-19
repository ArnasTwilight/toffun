<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DelStarsIdColToRelicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relics', function (Blueprint $table) {
            $table->dropForeign('relics_stars_fk');
            $table->dropIndex('relics_stars_idx');

            $table->dropColumn('stars_id');
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
            $table->unsignedBigInteger('stars_id')->after('rarity_id')->nullable();

            $table->index('stars_id','relics_stars_idx');
            $table->foreign('stars_id','relics_stars_fk')->on('stars')->references('id')->nullOnDelete()->cascadeOnUpdate();
        });
    }
}
