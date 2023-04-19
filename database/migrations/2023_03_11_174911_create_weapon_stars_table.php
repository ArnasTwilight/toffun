<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapon_stars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('weapon_id');
            $table->unsignedBigInteger('stars_id');
            $table->timestamps();

            $table->index('weapon_id', 'weapon_stars_idx');
            $table->index('stars_id', 'stars_weapon_idx');
            $table->foreign('weapon_id', 'weapon_stars_fk')->on('weapon')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('stars_id', 'stars_weapon_fk')->on('stars')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weapon_stars');
    }
}
