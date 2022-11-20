<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_gifts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('character_id');
            $table->unsignedBigInteger('gift_id');

            $table->timestamps();

            // IDX
            $table->index('character_id', 'character_gift_character_idx');
            $table->index('gift_id', 'character_gift_gift_idx');

            // FK
            $table->foreign('character_id', 'character_gift_character_fk')->on('character')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('gift_id', 'post_gift_gift_fk')->on('gift')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_gifts');
    }
}
