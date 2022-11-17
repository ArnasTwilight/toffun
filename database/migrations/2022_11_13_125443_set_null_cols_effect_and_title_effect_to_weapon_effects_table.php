<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetNullColsEffectAndTitleEffectToWeaponEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weapon_effects', function (Blueprint $table) {
            $table->string('title_effect')->nullable()->change();
            $table->text('effect')->nullable()->change();
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
            $table->string('title_effect')->nullable(false)->change();
            $table->text('effect')->nullable(false)->change();
        });
    }
}
