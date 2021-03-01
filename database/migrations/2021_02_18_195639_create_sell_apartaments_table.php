<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellApartamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_apartaments', function (Blueprint $table) {
            $table->id();
            $table->string('location', 255);
            $table->string('town', 255);
            $table->string('address', 255);
            $table->unsignedBigInteger('number_of_rooms_id');
            $table->foreign('number_of_rooms_id')
                ->references('id')
                ->on('rooms');
            $table->unsignedBigInteger('number_of_separated_rooms_id')->nullable();
            $table->foreign('number_of_separated_rooms_id')
                ->references('id')
                ->on('separated_rooms');
            $table->float('total_area');
            $table->float('living_area');
            $table->float('kitchen_area');
            $table->float('sells_area')->nullable(); //квадратура в разделе продажа комнаты
            $table->integer('floor');
            $table->integer('total_floors');
            $table->unsignedBigInteger('balcony_id')->nullable();
            $table->foreign('balcony_id')
                ->references('id')
                ->on('balconies');
            $table->unsignedBigInteger('bathroom_id')->nullable();
            $table->foreign('bathroom_id')
                ->references('id')
                ->on('bathrooms');
            $table->unsignedBigInteger('apartment_renovation_id')->nullable();
            $table->foreign('apartment_renovation_id')
                ->references('id')
                ->on('repairs');
            $table->unsignedBigInteger('type_of_walls_id')->nullable();
            $table->foreign('type_of_walls_id')
                ->references('id')
                ->on('walls');
            $table->integer('year_of_construction')->nullable();
            $table->integer('year_of_overhaul')->nullable();
            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')
                ->references('apartment_id')
                ->on('image');
            $table->string('first_img_name',255);
            $table->string('second_img_name',255);
            $table->string('third_img_name',255);
            $table->string('four_img_name',255);
            $table->string('five_img_name',255);
            $table->text('description')->nullable();
            $table->string('youtube_video', 255)->nullable();
            $table->float('price');
            $table->unsignedBigInteger('terms_of_a_transaction_id')->nullable();
            $table->foreign('terms_of_a_transaction_id')
                ->references('id')
                ->on('transactions');
            $table->unsignedBigInteger('contacts_id');
            $table->foreign('contacts_id')
                ->references('id')
                ->on('users');
            $table->string('slug')->nullable()->index();
            $table->string('number_of_rooms')->nullable();
            $table->string('slug_room')->nullable()->index();

            //Аренда квартир
            //Доп. условия аренды квартиры
            $table->boolean('fridge')->default(false);
            $table->boolean('elevator')->default(false);
            $table->boolean('internet')->default(false);
            $table->boolean('furniture')->default(false);
            $table->boolean('washer')->default(false);
            $table->float('rent_per_month')->nullable();
            $table->boolean('students')->default(false);
            $table->boolean('with_animals')->default(false);
            $table->boolean('with_kids')->default(false);

            //Аренда на сутки
            $table->unsignedBigInteger('number_of_berths_id')->nullable();
            $table->foreign('number_of_berths_id')
                ->references('id')
                ->on('berths');
            //Доп. условия аренды квартиры на сутки
            $table->boolean('dishes')->default(false);
            $table->boolean('microwave')->default(false);
            $table->boolean('tv')->default(false);
            $table->boolean('wifi')->default(false);
            $table->boolean('jacuzzi')->default(false);
            $table->float('rent_per_day')->nullable();
            $table->float('rent_per_night')->nullable();
            $table->float('rent_per_hour')->nullable();
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
        Schema::dropIfExists('sell_apartaments');
    }
}
