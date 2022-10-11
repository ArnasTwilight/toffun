<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConnectElementToWeaponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weapon', function (Blueprint $table) {
            $table->dropForeign('weapon_element_fk');
            $table->unsignedBigInteger('element_id')->nullable()->change();
            $table->foreign('element_id', 'weapon_element_fk')->on('element')->references('id')->restrictOnUpdate()->nullOnDelete();
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
            $table->foreign('element_id', 'weapon_element_fk')->on('element')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
        Schema::table('weapon', function (Blueprint $table) {
            $table->unsignedBigInteger('element_id')->nullable(false)->change();
        });
    }
}
