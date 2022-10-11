<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConnectElementToWeaponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weapon', function (Blueprint $table) {
            $table->index('element_id', 'weapon_element_idx');
            $table->foreign('element_id', 'weapon_element_fk')->on('element')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
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
            $table->dropForeign('weapon_element_fk');
            $table->dropIndex('weapon_element_idx');
        });
    }
}
