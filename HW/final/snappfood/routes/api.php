<?php

use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\RestaurantController;
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

Route::group(['middleware' => 'guest'], function () {
    Route::group([
        'prefix' => 'auth',
        'as' => 'auth.'
    ], function () {
        Route::post('register', [AuthController::class, 'register']);
        Route::post('login', [AuthController::class, 'login']);
    });
});

// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);



Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/address-add', [AddressController::class, 'store']);
    Route::get('/address-list', [AddressController::class, 'index']);
    Route::put('/address-list/{id}', [AddressController::class, 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::group([
        'prefix' => 'restaurant',
        'as' => 'restaurant.'
    ], function () {
        Route::get('/all', [RestaurantController::class, 'indexApi']);
        Route::get('/{id}', [RestaurantController::class, 'showApi']);
        Route::get('/{id}/foods', [RestaurantController::class, 'showFoodsApi']);
    });
});
