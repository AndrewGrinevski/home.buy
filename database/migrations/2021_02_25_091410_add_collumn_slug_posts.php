<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCollumnSlugPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sell_apartaments',function (Blueprint $table) {
           $table->string('slug')->nullable()->index();
           $table->string('number_of_rooms')->nullable();
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
            $table->string('slug')->nullable()->index();
            $table->string('number_of_rooms')->nullable();
        });
    }
}
