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
Route::group(['namespace' => 'API'], function () {
    Route::get('config', 'AuthController@config');
    Route::get('config/locales', 'AuthController@getLocales');
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    //Route::get('profile', 'AuthController@profile');

});

Route::group(['prefix'=>'v1', 'namespace' => 'API', 'middleware' => ['auth:sanctum']], function () {
    Route::get('profile', 'AuthController@profile');
    Route::post('logout', 'AuthController@logout');
    //return $request->user();
});
