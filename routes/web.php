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

//Route::get('/', 'SiteController@index');
Auth::routes();

//User
Route::prefix('/home')->namespace('Main\\User')->middleware(['role:user'])->group(function () {
    Route::get('/user_id={id}', 'HomeController@index')->name('home');
    Route::resource('/add', 'AddAnnouncementController')->names('home.addFlat');
});




//Admin
Route::get('/admins', 'Admin\\AdminController@index')->middleware(['role:admin'])->name('dashboard');
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
Route::prefix('/sell')->namespace('Main\\Sell')
    ->group(function () {
        Route::get('/flats', 'AllFlatController@index')->name('main.allFlats');
        Route::get('/1-room-flats', 'AllFlatController@showOneRoomFlats')->name('main.showOneRoomFlats');
        Route::get('/2-room-flats', 'AllFlatController@showTwoRoomFlats')->name('main.showTwoRoomFlats');
        Route::get('/3-room-flats', 'AllFlatController@showThreeRoomFlats')->name('main.showThreeRoomFlats');
        Route::get('/4+room-flats', 'AllFlatController@showFourPlusRoomFlats')->name('main.showFourPlusRoomFlats');
        Route::get('/flats/{slug}', 'AllFlatController@show')->name('main.allFlats.show');
        Route::get('/search', 'AllFlatController@search')->name('main.search');
    });

