<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relics', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('cooldown')->nullable();
            $table->text('description')->nullable();
            $table->text('one_star')->nullable();
            $table->text('two_star')->nullable();
            $table->text('three_star')->nullable();
            $table->text('four_star')->nullable();
            $table->text('five_star')->nullable();
            $table->unsignedBigInteger('rarity_id')->nullable();

            $table->timestamps();

            $table->index('rarity_id', 'relics_rarity_idx');
            $table->foreign('rarity_id', 'relics_rarity_fk')->on('rarity')->references('id')->nullOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relics');
    }
}
