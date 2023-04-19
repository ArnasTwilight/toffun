<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrixStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrix_stars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matrix_id');
            $table->unsignedBigInteger('stars_id');
            $table->timestamps();

            $table->index('matrix_id', 'matrix_stars_idx');
            $table->index('stars_id', 'stars_matrix_idx');
            $table->foreign('matrix_id', 'matrix_stars_fk')->on('matrix')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('stars_id', 'stars_matrix_fk')->on('stars')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matrix_stars');
    }
}
