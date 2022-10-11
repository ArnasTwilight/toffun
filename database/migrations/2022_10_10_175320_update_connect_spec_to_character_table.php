<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConnectSpecToCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('character', function (Blueprint $table) {
            $table->dropForeign('character_spec_fk');
            $table->foreign('spec_id', 'character_spec_fk')->on('spec')->references('id')->restrictOnUpdate()->nullOnDelete();
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
            $table->dropForeign('character_spec_fk');
            $table->foreign('spec_id', 'character_spec_fk')->on('spec')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }
}
