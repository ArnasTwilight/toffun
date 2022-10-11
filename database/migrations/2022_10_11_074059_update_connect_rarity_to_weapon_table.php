<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConnectRarityToWeaponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weapon', function (Blueprint $table) {
            $table->dropForeign('weapon_rarity_fk');
            $table->unsignedBigInteger('rarity_id')->nullable()->change();
            $table->foreign('rarity_id', 'weapon_rarity_fk')->on('rarity')->references('id')->restrictOnUpdate()->nullOnDelete();
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
            $table->foreign('rarity_id', 'weapon_rarity_fk')->on('rarity')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
        Schema::table('weapon', function (Blueprint $table) {
            $table->unsignedBigInteger('rarity_id')->nullable(false)->change();
        });
    }
}
