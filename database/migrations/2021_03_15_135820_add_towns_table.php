<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sell_apartaments',function (Blueprint $table) {
            $table->unsignedBigInteger('town_id');
            $table->foreign('town_id')
                ->references('id')
                ->on('towns');
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
            $table->unsignedBigInteger('town_id');
        });
    }
}
