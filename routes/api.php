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

Route::group(['prefix' => 'v1'], function () {
    Route::post('login', ['uses' => 'Api\Auth\LoginController@login']);
    Route::get('logout', ['uses' => 'Api\Auth\LoginController@logout']);
    Route::post('register', ['uses' => 'Api\Auth\LoginController@register']);
    Route::get('user', ['uses' => 'Api\Auth\LoginController@user']);
});