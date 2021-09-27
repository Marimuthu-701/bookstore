<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'admin.', 'namespace'=>'Admin'], function () {
    Auth::routes(['register' => false, 'verify' => false]);
    Route::get('/', function () {
        return redirect(route('admin.dashboard'));
    });
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['middleware' => 'admin', 'as' => 'admin.', 'namespace'=>'Admin'], function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::resource('users', 'AdminController');
    Route::post('users/index', 'AdminController@index')->name('users.list');

    Route::resource('books', 'BookController');
    Route::resource('authors', 'AuthorController');
});
