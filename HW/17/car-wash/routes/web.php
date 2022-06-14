<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Models\Booking;
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

Route::get('/', function () {
    return view('home');
});
Route::resource('users', UserController::class);
// Route::delete('/booking/{token}', [BookingController::class, 'destroy']);
Route::get('/booking/{token}/edit', [BookingController::class, 'edit']);
Route::delete('booking/{token}', [BookingController::class, 'destroy']);
Route::resource('booking', BookingController::class);
Route::get('/card', [BookingController::class, 'showCard']);
