<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DelToWeaponEffectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('weapon_effects');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('weapon_effects', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('character_id')->nullable();
            $table->string('title_effect')->nullable();
            $table->text('effect')->nullable();
            $table->timestamps();

            $table->index('character_id', 'weapon_effects_character_idx');
            $table->foreign('character_id', 'weapon_effects_character_fk')->on('character')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }
}
