<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('character', function (Blueprint $table) {
            $table->text('skills')->nullable()->change();
            $table->text('trait')->nullable()->change();
            $table->text('advancement')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('character', function (Blueprint $table) {
            $table->string('skills')->nullable()->change();
            $table->string('trait')->nullable()->change();
            $table->string('advancement')->nullable()->change();
        });
    }
}
