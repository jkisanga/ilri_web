<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateaudioTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('audio_category_id')->unsigned();
            $table->string('title');
            $table->string('desc');
            $table->string('file_path');
            $table->string('thumbnail');
            $table->foreign('audio_category_id')->references('id')->on('audio_categories')->onDelete('cascade');
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
        Schema::drop('audio');
    }
}
