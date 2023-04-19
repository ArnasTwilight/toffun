<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatrixBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrix_bonus', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('quantity');
            $table->text('bonus');
            $table->unsignedBigInteger('matrix_id');

            $table->timestamps();

            $table->index('matrix_id', 'mb_matrix_idx');
            $table->foreign('matrix_id', 'mb_matrix_fk')->on('matrix')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matrix_bonus');
    }
}
