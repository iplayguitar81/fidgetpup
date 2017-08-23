<?php

use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ratings', function ($table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('rating');
            $table->longtext('rate_message');
            $table->integer('user_id')->unsigned();
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('ratings');
    }
}
