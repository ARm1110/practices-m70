<?php

use App\Http\Controllers\API\AddressController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\API\WalletController;
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
        Route::get('/all', [RestaurantController::class, 'index']);
        Route::get('/{id}', [RestaurantController::class, 'show']);
        Route::get('/{id}/foods', [RestaurantController::class, 'showFoods']);
    });
    Route::group([
        'prefix' => 'carts',
        'as' => 'carts.'
    ], function () {
        Route::get('/', [CartController::class, 'index'])->name('list');
        Route::get('/show/{cart_id}', [CartController::class, 'show'])->name('show');
        Route::post('/add', [CartController::class, 'add'])->name('store');
        Route::patch('/add', [CartController::class, 'update'])->name('update');
        Route::get('/clear', [CartController::class, 'clear'])->name('clear');
        Route::get('/continue', [CartController::class, 'continue'])->name('continue');
    });
    Route::group(
        [
            'prefix' => 'orders',
            'as' => 'orders.'

        ],
        function () {
            Route::get('/{order_id}/payment', [WalletController::class, 'transfer'])->name('payment');
            //post comment
            Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
            //get comment

            Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
        }

    );


    Route::group(
        [
            'prefix' => 'wallet',
            'as' => 'wallet.'

        ],
        function () {
            Route::post('/deposit', [WalletController::class, 'addToCard'])->name('add');
            Route::post('/withdraw', [WalletController::class, 'withdrawCard'])->name('withdraw');
            Route::post('/forceWithdraw', [WalletController::class, 'forceWithdrawCard'])->name('forceWithdraw');
        }
    );
});

Route::post('/cache', [WalletController::class, 'testCache']);
