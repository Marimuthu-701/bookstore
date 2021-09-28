<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'ProductController@homePage')->name('home');
Route::get('/', 'ProductController@homePage');
Route::get('/books/{slug}', 'ProductController@bookInfo')->name('book.info');

Auth::routes();
Route::group(['middleware' => ['auth'] ], function () {
	Route::get('/profile', 'HomeController@profile')->name('profile');
	Route::get('/profile/edit', 'HomeController@profileEdit')->name('profile.edit');
	Route::post('/profile/update', 'HomeController@profileUpdate')->name('profile.update');

	Route::get('/password', 'HomeController@passwordChange')->name('password');
	Route::get('/password/edit', 'HomeController@passwordChangeEdit')->name('password.edit');
	Route::post('/password/update', 'HomeController@passwordChangeUpdate')->name('password.update');
	Route::post('/books/add-comment-review', 'ProductController@createCommentReview')->name('review-comments');

	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
