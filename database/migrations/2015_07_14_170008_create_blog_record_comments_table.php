<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogRecordCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_record_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('blog_record_id');
            $table->unsignedInteger('user_id');
            $table->text('text');
            $table->timestamps();

            $table->foreign('blog_record_id')->references('id')->on('blog_records')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog_record_comments');
    }
}
