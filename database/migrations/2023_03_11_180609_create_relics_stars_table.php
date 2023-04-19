<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelicsStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relics_stars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('relics_id');
            $table->unsignedBigInteger('stars_id');
            $table->timestamps();

            $table->index('relics_id', 'relics_stars_idx');
            $table->index('stars_id', 'stars_relics_idx');
            $table->foreign('relics_id', 'relics_stars_fk')->on('relics')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('stars_id', 'stars_relics_fk')->on('stars')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relics_stars');
    }
}
