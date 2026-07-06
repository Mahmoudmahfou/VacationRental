<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// hotels api
Route::get('/allhotels','Api\HotelsController@index');
Route::get('/showonehotel/{id}','Api\HotelsController@showOneHotel');
Route::get('/deletehotel/{id}','Api\HotelsController@deleteHotel');
Route::post('/createhotel','Api\HotelsController@CreateHotel');
Route::post('/updatehotel/{id}','Api\HotelsController@updateHotels');

// rooms api
Route::get('/allrooms','Api\RoomsController@index');
Route::get('/showoneroom/{id}','Api\RoomsController@showOneRoom');
Route::get('/deleteroom/{id}','Api\RoomsController@deleteRoom');

// bookings api
Route::get('/allbookings','Api\BookingController@index');
Route::get('/showonebooking/{id}','Api\BookingController@showOneBooking');
Route::get('/deletebooking/{id}','Api\BookingController@deleteBooking');
