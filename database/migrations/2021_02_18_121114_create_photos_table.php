<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('first_img_name',255);
            $table->string('second_img_name',255);
            $table->string('third_img_name',255);
            $table->string('four_img_name',255);
            $table->string('five_img_name',255);
            $table->string('six_img_name',255)->nullable();
            $table->string('seven_img_name',255)->nullable();
            $table->string('eight_img_name',255)->nullable();
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
        Schema::dropIfExists('photos');
    }
}
