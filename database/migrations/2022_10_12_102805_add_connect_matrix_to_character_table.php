<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConnectMatrixToCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('character', function (Blueprint $table) {
            $table->unsignedBigInteger('matrix_id')->nullable()->after('weapon_id');

            $table->index('matrix_id','character_matrix_idx');
            $table->foreign('matrix_id', 'character_matrix_fk')->on('matrix')->references('id')->cascadeOnUpdate()->nullOnDelete();
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
            $table->dropForeign('character_matrix_fk');
            $table->dropIndex('character_matrix_idx');

            $table->dropColumn('matrix_id');
        });
    }
}
