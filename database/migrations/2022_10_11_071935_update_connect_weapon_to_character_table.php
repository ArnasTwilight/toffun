<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConnectWeaponToCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('character', function (Blueprint $table) {
            $table->dropForeign('character_weapon_fk');
            $table->foreign('weapon_id', 'character_weapon_fk')->on('weapon')->references('id')->restrictOnUpdate()->nullOnDelete();
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
            $table->dropForeign('character_weapon_fk');
            $table->foreign('weapon_id', 'character_weapon_fk')->on('weapon')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }
}
