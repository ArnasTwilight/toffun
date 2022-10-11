<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConnectRarityToMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matrices', function (Blueprint $table) {
            $table->unsignedBigInteger('rarity_id')->after('character_id');
            $table->index('rarity_id', 'matrices_rarity_idx');
            $table->foreign('rarity_id', 'matrices_rarity_fk')->on('rarity')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matrices', function (Blueprint $table) {
            $table->dropForeign('matrices_rarity_fk');
            $table->dropIndex('matrices_rarity_idx');
            $table->dropColumn('rarity_id');
        });
    }
}
