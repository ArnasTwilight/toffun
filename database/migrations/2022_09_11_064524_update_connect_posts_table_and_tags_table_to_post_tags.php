<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConnectPostsTableAndTagsTableToPostTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_tags', function (Blueprint $table) {
            $table->dropForeign('post_tag_post_fk');
            $table->dropForeign('post_tag_tag_fk');

            $table->foreign('post_id', 'post_tag_post_fk')->on('posts')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('tag_id', 'post_tag_tag_fk')->on('tags')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_tags', function (Blueprint $table) {
            $table->dropForeign('post_tag_post_fk');
            $table->dropForeign('post_tag_tag_fk');

            $table->foreign('post_id', 'post_tag_post_fk')->on('posts')->references('id')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('tag_id', 'post_tag_tag_fk')->on('tags')->references('id')->restrictOnDelete()->restrictOnUpdate();
        });
    }
}
