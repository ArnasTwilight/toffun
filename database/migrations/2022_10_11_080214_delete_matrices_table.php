<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('matrices');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('matrices', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('rarity');
            $table->string('bonus');
            $table->unsignedBigInteger('character_id');

            $table->timestamps();
        });
    }
}
