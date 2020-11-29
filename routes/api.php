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

    // LoginController
    Route::post('/login', ['uses' => 'Api\Auth\LoginController@login']);
    Route::get('/logout', ['uses' => 'Api\Auth\LoginController@logout']);
    Route::post('/register', ['uses' => 'Api\Auth\LoginController@register']);
    Route::get('/user', ['uses' => 'Api\Auth\LoginController@user']);

    //Product Controller
    Route::get('/products', ['uses' => 'Api\ProductController@all']);
    Route::get('/products/{id}', ['uses' => 'Api\ProductController@show']);
    Route::post('/products', ['uses' => 'Api\ProductController@store']);
    Route::patch('/products/{id}', ['uses' => 'Api\ProductController@update']);
    Route::delete('/products/{id}', ['uses' => 'Api\ProductController@delete']);

    Route::get('/test/{id}', ['uses' => 'Api\ProductController@test']);

    //Category Controller
    // Route::get('/products', ['uses' => 'Api\ProductController@all']);
    // Route::get('/products/{id}', ['uses' => 'Api\ProductController@show']);
    Route::post('/categories', ['uses' => 'Api\CategoryController@store']);
    // Route::patch('/products/{id}', ['uses' => 'Api\ProductController@update']);
    // Route::delete('/products/{id}', ['uses' => 'Api\ProductController@delete']);
    Route::get('/categories/test/{id}', ['uses' => 'Api\CategoryController@test']);
});