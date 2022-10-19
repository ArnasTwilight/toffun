<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColStarsToMatrixTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matrix', function (Blueprint $table) {
            $table->unsignedBigInteger('stars_id')->after('rarity_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matrix', function (Blueprint $table) {
            $table->dropColumn('stars_id');
        });
    }
}
