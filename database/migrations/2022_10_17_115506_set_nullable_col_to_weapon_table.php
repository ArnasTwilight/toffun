<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetNullableColToWeaponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('weapon', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
            $table->float('shatter')->nullable()->change();
            $table->float('charge')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weapon', function (Blueprint $table) {
            $table->string('image')->nullable(false)->change();
            $table->float('shatter')->nullable(false)->change();
            $table->float('charge')->nullable(false)->change();
        });
    }
}
