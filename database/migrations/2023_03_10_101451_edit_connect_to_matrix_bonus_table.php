<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditConnectToMatrixBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matrix_bonus', function (Blueprint $table) {
            $table->dropForeign('mb_matrix_fk');
            $table->dropIndex('mb_matrix_idx');

            $table->index('matrix_id', 'mb_matrix_idx');
            $table->foreign('matrix_id', 'mb_matrix_fk')->on('matrix')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matrix_bonus', function (Blueprint $table) {
            $table->dropForeign('mb_matrix_fk');
            $table->dropIndex('mb_matrix_idx');

            $table->index('matrix_id', 'mb_matrix_idx');
            $table->foreign('matrix_id', 'mb_matrix_fk')->on('matrix')->references('id');
        });
    }
}
