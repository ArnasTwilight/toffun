<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConnectCharacterToWeaponEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weapon_effects', function (Blueprint $table) {
            $table->index('character_id', 'weapon_effects_character_idx');
            $table->foreign('character_id', 'weapon_effects_character_fk')->on('character')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weapon_effects', function (Blueprint $table) {
            $table->dropForeign('weapon_effects_character_fk');
            $table->dropIndex('weapon_effects_character_idx');
        });
    }
}
