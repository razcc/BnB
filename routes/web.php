<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Rotte Admin
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/', DashboardController::class);
    Route::resource('/apartments', ApartmentsController::class);
});

// Rotte Gest
Route::get('/', 'Guest\WelcomeController@index')->name('guest');
Route::get('/{id}', 'Guest\WelcomeController@show')->name('guest.show');

// Axios Search
Route::get('/api/search', 'Guest\SearchController@index')->name('search');

// Axios Serices
Route::get('api/search/services', 'Guest\SearchController@search')->name('services.search');

// Axios Rooms
Route::get('api/search/rooms', 'Guest\SearchController@rooms')->name('rooms.search');

// Axios Beds
Route::get('api/search/beds', 'Guest\SearchController@beds')->name('beds.search');

// Axios Bathrooms
Route::get('api/search/bath', 'Guest\SearchController@bathrooms')->name('bath.search');





