<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPostCommentsTable extends Migration
{
    public function up()
    {
        Schema::table('post_comments', function (Blueprint $table) {

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('post_comments', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['post_id']);
        });
    }
}
