<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //'gallery_id', 'file_name', 'file_size', 'file_mime', 'file_path', 'created_by'
            $table->integer('post_id')->unsigned()->nullable();
            $table->string('file_name');
            $table->string('file_size');
            $table->string('file_mime');
            $table->string('file_path');
            $table->string('caption');
            $table->integer('created_by');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('image_galleries');
    }
}
