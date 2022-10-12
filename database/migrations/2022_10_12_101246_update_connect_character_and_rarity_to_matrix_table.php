<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConnectCharacterAndRarityToMatrixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matrix', function (Blueprint $table) {
            $table->dropForeign('matrix_rarity_fk');
            $table->dropForeign('matrix_character_fk');

            $table->foreign('rarity_id', 'matrix_rarity_fk')->on('rarity')->references('id')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('character_id', 'matrix_character_fk')->on('character')->references('id')->nullOnDelete()->cascadeOnUpdate();
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
            $table->dropForeign('matrix_rarity_fk');
            $table->dropForeign('matrix_character_fk');

            $table->foreign('rarity_id', 'matrix_rarity_fk')->on('rarity')->references('id')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreign('character_id', 'matrix_character_fk')->on('character')->references('id')->restrictOnDelete()->cascadeOnUpdate();
        });
    }
}
