<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColImageToGiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gift', function (Blueprint $table) {
            $table->unsignedbigInteger('rarity_id')->nullable()->change();
            $table->string('image')->nullable()->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gift', function (Blueprint $table) {
            $table->unsignedbigInteger('rarity_id')->nullable(false)->change();
            $table->dropColumn('image');
        });
    }
}
