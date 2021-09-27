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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\PageController::class, 'index'])->name('home');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/contact-us', 'PageController@contactUs')->name('contact-us');
Route::get('/template', function() { return view('mails.user-approved-mail'); });

Route::group(['middleware' => ['auth'] ], function () {

	Route::get('/profile', 'HomeController@profile')->name('profile');
	Route::get('/profile/edit', 'HomeController@profileEdit')->name('profile.edit');
	Route::post('/profile/update', 'HomeController@profileUpdate')->name('profile.update');


	Route::get('/password', 'HomeController@passwordChange')->name('password');
	Route::get('/password/edit', 'HomeController@passwordChangeEdit')->name('password.edit');
	Route::post('/password/update', 'HomeController@passwordChangeUpdate')->name('password.update');

	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
