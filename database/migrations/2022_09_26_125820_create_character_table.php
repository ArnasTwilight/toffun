<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('image')->nullable();
            $table->string('main_image')->nullable();
            $table->string('skills')->nullable();
            $table->string('trait')->nullable();
            $table->string('advancement')->nullable();
            $table->unsignedBigInteger('spec_id')->nullable();
            $table->unsignedBigInteger('rarity_id')->nullable();
            $table->unsignedBigInteger('weapon_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character');
    }
}
