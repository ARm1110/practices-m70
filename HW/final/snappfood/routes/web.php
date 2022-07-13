<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OfferController;
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
        Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
    });
});

Route::group(['middleware' => 'auth'], function () {
    Route::group([
        'prefix' => 'dashboard',
        'as' => 'dashboard.'
    ], function () {
        Route::group(
            [
                'prefix' => 'admin',
                'as' => 'admin.'
            ],
            function () {
                Route::group(
                    [
                        'prefix' => 'offer',
                        'as' => 'offer.'
                    ],
                    function () {
                        Route::controller(OfferController::class)->group(function () {
                            Route::get('/all',  'index')->name('index');
                            Route::get('/create',  'create')->name('create');
                            Route::post('/store',  'store')->name('store');
                            Route::get('/edit/{id}',  'edit')->name('edit');
                            Route::put('/update/{id}',  'update')->name('update');
                            Route::put('/update/{id}/{status}',  'updateStatus')->name('updateStatus');
                            Route::delete('/delete/{id}', 'delete')->name('delete');
                            Route::delete('/trash/delete/{id}',  'destroy')->name('forceDelete');
                            Route::get('/trash/all', 'trash')->name('trash');
                            Route::put('/trash/restore/{id}', 'restore')->name('restore');
                        });
                    }
                );
            }
        );
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
        Route::controller(RestaurantController::class)->group(function () {
            Route::get('/add-restaurant', 'create')->name('restaurant.create');
            Route::get('/list-restaurant',  'index')->name('restaurant.index');
            Route::post('/add-restaurant',  'store')->name('restaurant.store');

            Route::put('/update-restaurant/{id}/{status}',  'updateStatus')->name('restaurant.update');
            Route::get('/restaurant/{id}/edit',  'edit')->name('restaurant.edit');
            Route::put('/restaurant/{id}/edit',  'update')->name('restaurant.edit.update');
        });
        Route::controller(MenuItemController::class)->group(function () {
            Route::group([
                'prefix' => 'menu',
                'as' => 'menu.'
            ], function () {
                Route::get('/create',  'create')->name('create');
                Route::post('/store',  'store')->name('store');
                Route::get('/index',  'index')->name('index');
                Route::post('/next-request',  'next')->name('next');
                Route::put('/food/{category}/{restaurant}',  'show')->name('show');
                Route::controller(OfferController::class)->group(function () {
                    Route::put('/add-offer',  'addOfferForm')->name('form_offer');
                    Route::post('/add-offer',  'setPivot')->name('setPivot');
                });
            });
        });
        Route::controller(FoodCategoryController::class)->group(function () {
            Route::group([
                'prefix' => 'food-category',
                'as' => 'food-category.'
            ], function () {
                Route::get('/create',  'create')->name('create');
                Route::get('/',  'index')->name('index');
                Route::post('/create',  'store')->name('store');
                Route::put('/{id}/{status}/updateStatus',  'updateStatus')->name('status.update');
                Route::get('/{id}/edit',  'edit')->name('edit');
                Route::put('/{id}/edit',  'update')->name('update');
                Route::get('/show/{id}',  'showAll')->name('showAll');
                Route::delete('/{id}/delete', 'destroy')->name('delete');
                Route::get('/{id}/trash', 'trash')->name('trash');
                Route::put('/{id}/trash/restore', 'restore')->name('restore');
                Route::delete('/{id}/trash/delete', 'forceDelete')->name('forceDelete');
            });
        });
    });
});
