<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRawDatasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('summary');
            $table->string('file_path');
            $table->string('thumbnail');
            $table->integer('data_category_id')->unsigned();
            $table->foreign('data_category_id')->references('id')->on('data_categories')->onDelete('cascade');
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
        Schema::drop('raw_datas');
    }
}
