<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterRewardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_reward', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('points')->nullable();
            $table->text('reward')->nullable();
            $table->unsignedBigInteger('character_id');
            $table->timestamps();

            $table->index('character_id', 'cr_character_idx');
            $table->foreign('character_id', 'cr_character_fk')->on('character')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_reward');
    }
}
