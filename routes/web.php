<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// welcome page
Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/contact', 'HomeController@contact')->name('contact');


Route::group(['prefix' => 'hotels'], function () {

    // hotels
    Route::get('/rooms/{id}', 'Hotels\HotelsController@rooms')->name('hotels.rooms');
    Route::get('/rooms-details/{id}', 'Hotels\HotelsController@roomDetails')->name('hotels.rooms.details');
    Route::post('/rooms-booking/{id}', 'Hotels\HotelsController@roomBooking')->name('hotels.rooms.booking');

    // paypal booking
    Route::get('/pay', 'Hotels\HotelsController@payWithPaypal')->name('hotel.pay')->middleware('check.for.price');
    Route::get('/success', 'Hotels\HotelsController@success')->name('hotel.success')->middleware('check.for.price');
});





// Users bookings
Route::get('users/my-bookings', 'Users\UsersController@myBookings')->name('users.bookings')->middleware('auth:web');



// admin panel view page
Route::get('admin/login', 'Admins\AdminController@viewLogin')->name('view.login')->middleware('check.for.login');

// check login admin
Route::post('admin/login', 'Admins\AdminController@checkLogin')->name('check.login');

Route::group(['prefix' => 'admins', 'middleware' => 'auth:admin'], function () {

    // Dashboard admin page
    Route::get('/dashboard', 'Admins\AdminController@index')->name('admins.dashboard');

    // view all admin page
    Route::get('/all-admins', 'Admins\AdminController@allAdmins')->name('admins.all');

    // delete one admin
    Route::get('/deleteadmin/{id}', 'Admins\AdminController@deleteAdmin')->name('admins.delete');

    //  Create new admin
    Route::get('/create-admin', 'Admins\AdminController@createAdmins')->name('admins.create');

    // save create admin
    Route::post('/save-admin', 'Admins\AdminController@saveAdmins')->name('admins.save');

    // view all hotels page
    Route::get('/all-hotels', 'Admins\AdminController@allHotels')->name('hotels.all');

    //  Create new hotel
    Route::get('/create-hotel', 'Admins\AdminController@createHotels')->name('hotels.create');

    // save create hotel
    Route::post('/save-hotel', 'Admins\AdminController@saveHotels')->name('hotels.save');

    //  Edit data for hotel
    Route::get('/edit-hotel/{id}', 'Admins\AdminController@editHotels')->name('hotels.edit');

    //  update data of hotel
    Route::post('/update-hotel/{id}', 'Admins\AdminController@updateHotels')->name('hotels.update');

    //  delete one hotel
    Route::get('/delete-hotel/{id}', 'Admins\AdminController@deleteHotels')->name('hotels.delete');

    // view all Rooms page
    Route::get('/all-rooms', 'Admins\AdminController@allRooms')->name('rooms.all');

    //  Create new Rooms
    Route::get('/create-room', 'Admins\AdminController@createRooms')->name('rooms.create');

    // save create rooms
    Route::post('/save-room', 'Admins\AdminController@saveRooms')->name('rooms.save');

    //  delete one room
    Route::get('/delete-room/{id}', 'Admins\AdminController@deleteRooms')->name('rooms.delete');

    // view all bookings page
    Route::get('/all-bookings', 'Admins\AdminController@allBookings')->name('bookings.all');

    //  Edit data for bookings
    Route::get('/edit-status/{id}', 'Admins\AdminController@editStatus')->name('edit.status');

    //  update data of status
    Route::post('/update-status/{id}', 'Admins\AdminController@updateStatus')->name('status.update');

    //  delete one room
    Route::get('/delete-booking/{id}', 'Admins\AdminController@deleteBookings')->name('bookings.delete');

});
