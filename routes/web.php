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
    \Debugbar::disable();
    $banners = [
        asset('storage/meetup-uinsa.jpg'),
        asset('storage/meetup-ideal-design.jpg'),
        asset('img/foto-bersama-1.jpg'),
        asset('img/surabayadev-family.jpg'),
    ];

    return view('theme::landingpage', compact('banners'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
