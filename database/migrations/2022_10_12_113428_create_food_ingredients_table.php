<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_ingredients', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('ingredient_id');

            $table->timestamps();


            $table->index('food_id', 'food_ingredients_food_idx');
            $table->index('ingredient_id', 'food_ingredients_ingredient_idx');

            $table->foreign('food_id', 'food_ingredients_food_fk')->on('food')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('ingredient_id', 'food_ingredients_ingredient_fk')->on('ingredients')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_ingredients');
    }
}
