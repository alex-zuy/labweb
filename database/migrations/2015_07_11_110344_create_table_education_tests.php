<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEducationTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_tests', function(Blueprint $table) {
            $table->increments('id');
            $table->string('full_name', 100);
            $table->string('gender', 10);
            $table->string('group', 10);
            $table->string('answer_one', 30);
            $table->string('answer_two', 100);
            $table->string('answer_three', 30);
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
        Schema::drop('education_tests');
    }
}
