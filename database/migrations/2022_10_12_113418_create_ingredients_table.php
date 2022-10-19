<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->unsignedBigInteger('rarity_id')->nullable();
            $table->timestamps();


            $table->index('rarity_id', 'ingredients_rarity_idx');
            $table->foreign('rarity_id', 'ingredients_rarity_fk')->on('rarity')->references('id')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
