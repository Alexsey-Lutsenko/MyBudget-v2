<?php

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', App\Http\Controllers\Category\IndexController::class);
        Route::post('/', App\Http\Controllers\Category\StoreController::class);
        Route::patch('/{category}', App\Http\Controllers\Category\UpdateController::class);
        Route::delete('/{category}', App\Http\Controllers\Category\DestroyController::class);
    });

    Route::group(['prefix' => 'incomes'], function () {
        Route::get('/', App\Http\Controllers\Income\IndexController::class);
        Route::post('/', App\Http\Controllers\Income\StoreController::class);
        Route::delete('/{income}', App\Http\Controllers\Income\DestroyController::class);
    });

    Route::group(['prefix' => 'incomes'], function () {
        Route::get('/', App\Http\Controllers\Income\IndexController::class);
        Route::post('/', App\Http\Controllers\Income\StoreController::class);
        Route::delete('/{income}', App\Http\Controllers\Income\DestroyController::class);
    });
});

//Route::get('/send', App\Http\Controllers\MailController::class);
