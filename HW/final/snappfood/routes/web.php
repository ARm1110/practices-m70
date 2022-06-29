<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ShopperController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'guest'], function () {
    Route::group([
        'prefix' => 'home',
        'as' => 'home.'
    ], function () {
        Route::get('login', [AuthController::class, 'login'])->name('show.login');
        Route::post('login', [AuthController::class, 'postLogin'])->name('login');
        Route::get('register', [AuthController::class, 'register'])->name('show.register');
        Route::post('register', [AuthController::class, 'postRegister'])->name('register');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'home',
        'as' => 'home.'
    ], function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'dashboard',
        'as' => 'dashboard.'
    ], function () {
        // Route::get('shopper', [DashboardController::class, 'shopper'])->name('dashboard');
        Route::get('admin', [DashboardController::class, 'admin'])->name('admin');
        Route::get('/users/list', [DashboardController::class, 'showUser'])->name('users');
        Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.edit');
        Route::put('/users/update/{id}/{status}', [UserController::class, 'update'])->name('user.update');
        Route::put('/users/filter', [UserController::class, 'filter'])->name('users.filter');
        Route::put('/users/update/{id}/{status}', [UserController::class, 'update'])->name('user.update');
        Route::get('/shopper', [ShopperController::class, 'index'])->name('shopper');
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'shopper',
        'as' => 'shopper.'
    ], function () {
        Route::get('/add-restaurant', [RestaurantController::class, 'create'])->name('restaurant.create');
        Route::get('/list-restaurant', [RestaurantController::class, 'index'])->name('restaurant.index');
        Route::post('/add-restaurant', [RestaurantController::class, 'store'])->name('restaurant.store');
        Route::put('/update-restaurant/{id}/{status}', [RestaurantController::class, 'updateStatus'])->name('restaurant.update');
        Route::get('/restaurant/{id}/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');
        Route::put('/restaurant/{id}/edit', [RestaurantController::class, 'update'])->name('restaurant.edit.update');
        Route::get('/menu/create', [MenuItemController::class, 'create'])->name('menu.create');
        Route::get('/menu/index', [MenuItemController::class, 'index'])->name('menu.index');
    });
});
