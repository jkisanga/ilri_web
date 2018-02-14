<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_category_id')->unsigned();
            $table->string('title');
            $table->string('desc');
            $table->string('file_path');
            $table->string('thumbnail');
            $table->integer('user_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('video_category_id')->references('id')->on('video_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('videos');
    }
}
