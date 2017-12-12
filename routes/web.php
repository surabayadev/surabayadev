<?php

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
    return view('landing_page');
});

// Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// Route::get('resend-email', 'Auth\RegisterController@resendEmail')->name('resendEmail');
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/events', function () {
    return view('event');
})->name('event');

Route::get('/members', function () {
    return 'members page';
})->name('member');
