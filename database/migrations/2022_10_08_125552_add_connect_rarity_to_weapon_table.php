<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConnectRarityToWeaponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weapon', function (Blueprint $table) {
            $table->unsignedBigInteger('rarity_id')->after('element_id');
            $table->index('rarity_id', 'weapon_rarity_idx');
            $table->foreign('rarity_id', 'weapon_rarity_fk')->on('rarity')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weapon', function (Blueprint $table) {
            $table->dropForeign('weapon_rarity_fk');
            $table->dropIndex('weapon_rarity_idx');
            $table->dropColumn('rarity_id');
        });
    }
}
