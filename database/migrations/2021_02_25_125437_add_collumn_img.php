<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnImg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sell_apartaments',function (Blueprint $table) {
            $table->string('first_img_name',255);
            $table->string('second_img_name',255);
            $table->string('third_img_name',255);
            $table->string('four_img_name',255);
            $table->string('five_img_name',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sell_apartaments',function (Blueprint $table) {
            $table->string('first_img_name',255);
            $table->string('second_img_name',255);
            $table->string('third_img_name',255);
            $table->string('four_img_name',255);
            $table->string('five_img_name',255);
        });
    }
}
