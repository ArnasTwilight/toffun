<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteConnectCharacterToMatrixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matrix', function (Blueprint $table) {
            $table->dropForeign('matrix_character_fk');
            $table->dropIndex('matrix_character_idx');

            $table->dropColumn('character_id');
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
            $table->unsignedBigInteger('character_id')->nullable();

            $table->index('character_id', 'matrix_character_idx');
            $table->foreign('character_id', 'matrix_character_fk')->on('character')->references('id')->nullOnDelete()->cascadeOnUpdate();
        });
    }
}
