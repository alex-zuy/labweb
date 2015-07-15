<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject', 40);
            $table->string('text');
            $table->binary('image_data')->nullable();
            $table->string('image_mime_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog_records');
    }
}
