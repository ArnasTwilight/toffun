<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColImageAndConnectRarityAndCharacterToMatrixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matrix', function (Blueprint $table) {
            $table->string('image')->after('title')->nullable();

            $table->index('rarity_id', 'matrix_rarity_idx');
            $table->foreign('rarity_id', 'matrix_rarity_fk')->on('rarity')->references('id')->restrictOnDelete()->cascadeOnUpdate();

            $table->index('character_id', 'matrix_character_idx');
            $table->foreign('character_id', 'matrix_character_fk')->on('character')->references('id')->restrictOnDelete()->cascadeOnUpdate();
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
            $table->dropColumn('image');

            $table->dropForeign('matrix_rarity_fk');
            $table->dropIndex('matrix_rarity_idx');

            $table->dropForeign('matrix_character_fk');
            $table->dropIndex('matrix_character_idx');
        });
    }
}
