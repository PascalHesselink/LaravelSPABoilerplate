<?php

use Illuminate\Http\Request;

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

Route::namespace('Api')->group(function () {
    Route::group(['prefix' => 'auth'], function ($router) {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');

        Route::middleware('auth:api')->group(function () {
            Route::post('me', 'AuthController@me');
            Route::post('logout', 'AuthController@logout');
        });
    });
});

// User should be authenticated for these routes
Route::namespace('Api')->middleware('auth:api')->group(function () {
    //Route::apiResource('users', 'UserController');
});
