<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('bonus')->nullable();
            $table->unsignedBigInteger('rarity_id')->nullable();
            $table->unsignedBigInteger('spec_id')->nullable();
            $table->timestamps();

            $table->index('rarity_id', 'food_rarity_idx');
            $table->index('spec_id', 'food_spec_idx');

            $table->foreign('rarity_id', 'food_rarity_fk')->on('rarity')->references('id')->nullOnDelete()->cascadeOnUpdate();
            $table->foreign('spec_id', 'food_spec_fk')->on('spec')->references('id')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food');
    }
}
