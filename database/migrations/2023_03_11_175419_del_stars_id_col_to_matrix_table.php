<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DelStarsIdColToMatrixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matrix', function (Blueprint $table) {
            $table->dropForeign('matrix_stars_fk');
            $table->dropIndex('matrix_stars_idx');

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
        Schema::table('matrix', function (Blueprint $table) {
            $table->unsignedBigInteger('stars_id')->after('rarity_id')->nullable();

            $table->index('stars_id','matrix_stars_idx');
            $table->foreign('stars_id','matrix_stars_fk')->on('stars')->references('id')->nullOnDelete()->cascadeOnUpdate();
        });
    }
}
