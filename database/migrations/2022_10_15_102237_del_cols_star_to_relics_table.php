<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DelColsStarToRelicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('relics', function (Blueprint $table) {
            $table->dropColumn('one_star');
            $table->dropColumn('two_star');
            $table->dropColumn('three_star');
            $table->dropColumn('four_star');
            $table->dropColumn('five_star');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relics', function (Blueprint $table) {
            $table->text('one_star')->nullable()->after('description');
            $table->text('two_star')->nullable()->after('one_star');
            $table->text('three_star')->nullable()->after('two_star');
            $table->text('four_star')->nullable()->after('three_star');
            $table->text('five_star')->nullable()->after('four_star');
        });
    }
}
