<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConnectRarityToGiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gift', function (Blueprint $table) {
            $table->index('rarity_id', 'gift_rarity_idx');
            $table->foreign('rarity_id', 'gift_rarity_fk')->on('rarity')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gift', function (Blueprint $table) {
            $table->dropForeign('gift_rarity_fk');
            $table->dropIndex('gift_rarity_idx');
        });
    }
}
