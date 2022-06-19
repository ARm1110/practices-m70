<?php


use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::delete('/booking/{token}', [BookingController::class, 'destroy'])
    ->middleware(['auth']);

Route::get('/booking/{token}/edit', [BookingController::class, 'edit'])
    ->middleware(['auth']);

Route::delete('booking/{token}', [BookingController::class, 'destroy'])
    ->middleware(['auth']);

Route::resource('booking', BookingController::class)
    ->middleware(['auth']);

Route::get('/card', [BookingController::class, 'showCard'])
    ->middleware(['auth']);


Route::get('home/login', [HomeController::class, 'loginPage'])
    ->name('login');

Route::get('home/sing-up', [HomeController::class, 'registerPage'])
    ->name('register');


Route::get('home/dashboard', [HomeController::class, 'dashboard'])
    ->name('dashboard')
    ->middleware(['auth']);


Route::post('home/register', [UserController::class, 'register'])
    ->name('user.register')
    ->middleware(['guest']);


Route::post('home/login', [UserController::class, 'login'])
    ->name('user.login')
    ->middleware(['guest']);



Route::get('home/logout', [UserController::class, 'logout'])
    ->name('user.logout')
    ->middleware(['auth']);
