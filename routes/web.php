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

Auth::routes(['verify' => true]);

//Admin
Route::prefix('admins')->middleware(['role:admin'])->namespace('Admin')
    ->group(function () {
        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::resource('/show_users', 'ShowUserAdsController')->names('admin.showUsers');
        Route::resource('/add_role', 'AddRoleController')->names('admin.addRole');
    });
Route::prefix('admins')->middleware(['role:admin'])->namespace('Admin\\AddParameters')
    ->group(function () {
        Route::resource('/add_param/towns', 'AddTownController')->names('admin.addParam.town');
        Route::resource('/add_param/number_of_rooms', 'AddRoomController')->names('admin.addParam.room');
        Route::resource('/add_param/number_of_separated_rooms', 'AddSeparatedRoomController')->names('admin.addParam.separatedRoom');
        Route::resource('/add_param/berths', 'AddBerthController')->names('admin.addParam.berth');
        Route::resource('/add_param/balconies', 'AddBalconyController')->names('admin.addParam.balcony');
        Route::resource('/add_param/bathrooms', 'AddBathroomController')->names('admin.addParam.bathroom');
        Route::resource('/add_param/repairs', 'AddRepairController')->names('admin.addParam.repair');
        Route::resource('/add_param/walls', 'AddWallController')->names('admin.addParam.wall');
        Route::resource('/add_param/transactions', 'AddTransactionController')->names('admin.addParam.transaction');
    });

//Main
Route::get('/', 'Main\\MainController@index')->name('mainPage');

//Sell
Route::prefix('/sell')->namespace('Main\\Sell')
    ->group(function () {
        Route::get('/flats', 'AllFlatController@index')->name('main.allFlats');
        Route::post('/flats', 'AllFlatController@flatsFlat')->name('flats.flat');
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
        Route::get('/1-room-flats', 'AllRentFlatPerMonthController@showOneRoomFlats')->name('main.showRentOneRoomFlats');
        Route::get('/2-room-flats', 'AllRentFlatPerMonthController@showTwoRoomFlats')->name('main.showRentTwoRoomFlats');
        Route::get('/3-room-flats', 'AllRentFlatPerMonthController@showThreeRoomFlats')->name('main.showRentThreeRoomFlats');
        Route::get('/4+room-flats', 'AllRentFlatPerMonthController@showFourPlusRoomFlats')->name('main.showRentFourPlusRoomFlats');
        Route::get('/flats/{slug}', 'AllRentFlatPerMonthController@show')->name('main.allRentFlats.show');
        Route::get('/flat/search', 'AllRentFlatPerMonthController@search')->name('main.rentSearch');
        //Flats per day
        Route::get('/apartments', 'AllRentFlatPerDayController@index')->name('main.allRentApartments');
        Route::get('/1-room-apartment', 'AllRentFlatPerDayController@showOneRoomFlats')->name('main.showRentOneRoomApartments');
        Route::get('/2-room-apartment', 'AllRentFlatPerDayController@showTwoRoomFlats')->name('main.showRentTwoRoomApartments');
        Route::get('/3-room-apartment', 'AllRentFlatPerDayController@showThreeRoomFlats')->name('main.showRentThreeRoomApartments');
        Route::get('/4+room-apartment', 'AllRentFlatPerDayController@showFourPlusRoomFlats')->name('main.showRentFourPlusRoomApartments');
        Route::get('/apartment/{slug}', 'AllRentFlatPerDayController@show')->name('main.allRentApartments.show');
        Route::get('/apartments/search', 'AllRentFlatPerDayController@search')->name('main.rentApartmentsSearch');
    });

//Ajax
Route::post('/ajaxRequest', 'Main\\Sell\\AllFlatController@ajaxRequest')->name('ajaxRequest');
Route::get('/ajax-autocomplete-search','Main\\TownSearchController@selectSearch');

//User

Route::prefix('/home')->namespace('Main\\User')->middleware(['role:user', 'verified'])->group(function () {
    Route::get('/user_id={id}', 'HomeController@index')->name('home');
    Route::get('/contacts_information', 'HomeController@profile')->name('profile');
    Route::post('/contacts_information/{id}', 'HomeController@update')->name('profile.update');
    Route::get('/favorite', 'FavoriteController@index')->name('favorite');
    Route::resource('/add/flats/sell', 'AddSellFlatController')->names('home.addSellFlat');
    Route::resource('/add/apartment/rent', 'AddRentApartmentController')->names('home.addRentApartment');
    Route::resource('/add/flat/rent', 'AddRentFlatController')->names('home.addRentFlat');
});

//Moderator

Route::prefix('/home-moderator')->namespace('Main\\Moderator')->middleware(['role:moderator', 'verified'])->group(function () {
    Route::get('/moderator_id={id}', 'HomeController@index')->name('home.moderator');
    Route::get('/contacts_information', 'HomeController@profile')->name('profile.moderator');
    Route::post('/contacts_information/{id}', 'HomeController@update')->name('profile.moderator.update');
    Route::post('/block-unblock', 'HomeController@blockUnblock')->name('blockUnblock.moderator');
});

