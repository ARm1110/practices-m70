<?php


use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StationController;
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


Route::get('home/dashboard', [DashboardController::class, 'index'])
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


Route::get('/dashboard/users/list', [UserController::class, 'index'])
    ->name('dashboard.users')
    ->middleware(['auth']);

Route::get('/dashboard/user/show/{id}', [UserController::class, 'show'])
    ->name('dashboard.user.show')
    ->middleware(['auth']);

Route::put('dashboard/users/update/{id}/{status}', [UserController::class, 'update'])
    ->name('dashboard.user.update')
    ->middleware(['auth']);


Route::put('/dashboard/users/filter', [UserController::class, 'filter'])
    ->name('dashboard.users.filter')
    ->middleware(['auth']);

//services admin
Route::get('/dashboard/service', [ServiceController::class, 'index'])
    ->name('dashboard.service')
    ->middleware(['auth']);

Route::put('/dashboard/service/update/{id}/{status}', [ServiceController::class, 'update'])
    ->name('dashboard.service.update')
    ->middleware(['auth']);

Route::get('/dashboard/service/{id}/edit', [ServiceController::class, 'edit'])
    ->name('dashboard.service.edit')
    ->middleware(['auth']);

Route::put('/dashboard/service/{id}/edit', [ServiceController::class, 'update'])
    ->name('dashboard.service.edit.update')
    ->middleware(['auth']);

Route::put('/dashboard/services/filter', [ServiceController::class, 'filter'])
    ->name('dashboard.service.filter')
    ->middleware(['auth']);

Route::get('/dashboard/services/create', [ServiceController::class, 'create'])
    ->name('dashboard.service.create')
    ->middleware(['auth']);

Route::post('/dashboard/services/store', [ServiceController::class, 'store'])
    ->name('dashboard.service.store')
    ->middleware(['auth']);

Route::delete('/dashboard/services/{id}', [ServiceController::class, 'destroy'])
    ->name('dashboard.service.destroy')
    ->middleware(['auth']);


//station admin


Route::get('/dashboard/stations', [StationController::class, 'index'])
    ->name('dashboard.station')
    ->middleware(['auth']);


Route::put('/dashboard/stations/update/{id}/{status}', [StationController::class, 'update'])
    ->name('dashboard.station.update')
    ->middleware(['auth']);

Route::get('/dashboard/stations/{id}/edit', [StationController::class, 'edit'])
    ->name('dashboard.station.edit')
    ->middleware(['auth']);

Route::put('/dashboard/stations/{id}/edit', [StationController::class, 'update'])
    ->name('dashboard.station.edit.update')
    ->middleware(['auth']);

Route::put('/dashboard/stations/filter', [StationController::class, 'filter'])
    ->name('dashboard.station.filter')
    ->middleware(['auth']);

Route::get('/dashboard/stations/create', [StationController::class, 'create'])
    ->name('dashboard.station.create')
    ->middleware(['auth']);

Route::post('/dashboard/stations/store', [StationController::class, 'store'])
    ->name('dashboard.station.store')
    ->middleware(['auth']);

Route::delete('/dashboard/stations/{id}', [StationController::class, 'destroy'])
    ->name('dashboard.station.destroy')
    ->middleware(['auth']);



//booking admin


Route::get('/dashboard/bookings', [BookingController::class, 'showAll'])
    ->name('dashboard.booking')
    ->middleware(['auth']);

Route::put('/dashboard/booking/update/{id}/{status}', [BookingController::class, 'update'])
    ->name('dashboard.booking.update')
    ->middleware(['auth']);

Route::delete('/dashboard/booking/{id}', [BookingController::class, 'destroy'])
    ->name('dashboard.booking.destroy')
    ->middleware(['auth']);

Route::put('/dashboard/booking/filter', [BookingController::class, 'filter'])
    ->name('dashboard.booking.filter')
    ->middleware(['auth']);
