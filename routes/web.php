<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//test
Route::get('/test', 'TestController@index')->name('test');
Route::get('/test1', 'TestController@index')->name('test');
Route::get('ajax-autocomplete-search','TestController@selectSearch');


Auth::routes(['verify' => true]);

//Admin
Route::prefix('admins')->middleware(['role:admin'])->namespace('Admin')
    ->group(function () {
        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::resource('/add_role', 'AddRoleController')->names('admin.addRole');
    });

Route::prefix('admins')->middleware(['role:admin'])->namespace('Admin\\Sell')
    ->group(function () {
        Route::resource('/sell/flats', 'SellApartamentController')->names('admin.sellFlats');
        Route::resource('/sell/add_param/number_of_rooms', 'AddRoomController')->names('admin.addParam.room');
        Route::resource('/sell/add_param/number_of_separated_rooms', 'AddSeparatedRoomController')->names('admin.addParam.separatedRoom');
        Route::resource('/sell/add_param/berth', 'AddBerthController')->names('admin.addParam.berth');
        Route::resource('/sell/add_param/balcony', 'AddBalconyController')->names('admin.addParam.balcony');
        Route::resource('/sell/add_param/bathroom', 'AddBathroomController')->names('admin.addParam.bathroom');
        Route::resource('/sell/add_param/repair', 'AddRepairController')->names('admin.addParam.repair');
        Route::resource('/sell/add_param/wall', 'AddWallController')->names('admin.addParam.wall');
        Route::resource('/sell/add_param/transaction', 'AddTransactionController')->names('admin.addParam.transaction');
    });


//Main
Route::get('/', 'Main\\MainController@index')->name('mainPage');

//Sell
Route::prefix('/sell')->namespace('Main\\Sell')
    ->group(function () {
        Route::get('/flats', 'AllFlatController@index')->name('main.allFlats');
        Route::post('/flats', 'AllFlatController@flatsFlat')->name('flats.flat');
        Route::post('/ajaxRequest', 'AllFlatController@ajaxRequest')->name('ajaxRequest');
        Route::get('/1-room-flats', 'AllFlatController@showOneRoomFlats')->name('main.showOneRoomFlats');
        Route::get('/2-room-flats', 'AllFlatController@showTwoRoomFlats')->name('main.showTwoRoomFlats');
        Route::get('/3-room-flats', 'AllFlatController@showThreeRoomFlats')->name('main.showThreeRoomFlats');
        Route::get('/4+room-flats', 'AllFlatController@showFourPlusRoomFlats')->name('main.showFourPlusRoomFlats');
        Route::get('/flats/{slug}', 'AllFlatController@show')->name('main.allFlats.show');
        Route::get('/search', 'AllFlatController@search')->name('main.search');
    });

//Rent
Route::prefix('/rent')->namespace('Main\\Rent')
    ->group(function () {
        //Flats per month
        Route::get('/flats', 'AllRentFlatPerMonthController@index')->name('main.allRentFlats');
        Route::post('/ajaxRequest', 'AllRentFlatPerMonthController@ajaxRequest')->name('main.ajaxRequest');
        Route::get('/1-room-flats', 'AllRentFlatPerMonthController@showOneRoomFlats')->name('main.showRentOneRoomFlats');
        Route::get('/2-room-flats', 'AllRentFlatPerMonthController@showTwoRoomFlats')->name('main.showRentTwoRoomFlats');
        Route::get('/3-room-flats', 'AllRentFlatPerMonthController@showThreeRoomFlats')->name('main.showRentThreeRoomFlats');
        Route::get('/4+room-flats', 'AllRentFlatPerMonthController@showFourPlusRoomFlats')->name('main.showRentFourPlusRoomFlats');
        Route::get('/flats/{slug}', 'AllRentFlatPerMonthController@show')->name('main.allRentFlats.show');
        Route::get('/flat/search', 'AllRentFlatPerMonthController@search')->name('main.rentSearch');
        //Flats per day
        Route::get('/apartments', 'AllRentFlatPerDayController@index')->name('main.allRentApartments');
        Route::post('/ajaxRequest', 'AllRentFlatPerDayController@ajaxRequest')->name('main.ajaxRequest');
        Route::get('/1-room-apartment', 'AllRentFlatPerDayController@showOneRoomFlats')->name('main.showRentOneRoomApartments');
        Route::get('/2-room-apartment', 'AllRentFlatPerDayController@showTwoRoomFlats')->name('main.showRentTwoRoomApartments');
        Route::get('/3-room-apartment', 'AllRentFlatPerDayController@showThreeRoomFlats')->name('main.showRentThreeRoomApartments');
        Route::get('/4+room-apartment', 'AllRentFlatPerDayController@showFourPlusRoomFlats')->name('main.showRentFourPlusRoomApartments');
        Route::get('/apartment/{slug}', 'AllRentFlatPerDayController@show')->name('main.allRentApartments.show');
        Route::get('/apartments/search', 'AllRentFlatPerDayController@search')->name('main.rentApartmentsSearch');
    });

//User
Route::prefix('/home')->namespace('Main\\User')->middleware(['role:user','verified'])->group(function () {



    Route::get('/user_id={id}', 'HomeController@index')->name('home');
    Route::get('/contacts_information', 'HomeController@profile')->name('profile');
    Route::post('/contacts_information/{id}', 'HomeController@update')->name('profile.update');
    Route::get('/contacts_information', 'HomeController@profile')->name('profile');
    Route::get('/favorite', 'FavoriteController@index')->name('favorite');
    Route::resource('/add/flats/sell', 'AddSellFlatController')->names('home.addSellFlat');
    Route::get('/ajax-autocomplete-search','AddSellFlatController@selectSearch');
    Route::resource('/add/apartment/rent', 'AddRentApartmentController')->names('home.addRentApartment');
    Route::resource('/add/flat/rent', 'AddRentFlatController')->names('home.addRentFlat');
});

