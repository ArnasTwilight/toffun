<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditToStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stars', function (Blueprint $table) {
            $table->dropColumn('C0');
            $table->dropColumn('C1');
            $table->dropColumn('C2');
            $table->dropColumn('C3');
            $table->dropColumn('C4');
            $table->dropColumn('C5');
            $table->dropColumn('C6');

            $table->text('effect')->after('id');
            $table->unsignedInteger('star')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stars', function (Blueprint $table) {

            $table->dropColumn('star');
            $table->dropColumn('effect');

            $table->text('C6')->nullable()->after('id');
            $table->text('C5')->nullable()->after('id');
            $table->text('C4')->nullable()->after('id');
            $table->text('C3')->nullable()->after('id');
            $table->text('C2')->nullable()->after('id');
            $table->text('C1')->nullable()->after('id');
            $table->text('C0')->nullable()->after('id');
        });
    }
}
