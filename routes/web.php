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

