<?php

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('event', 'EventController');

Route::resource('category', 'CategoryController');

Route::resource('blog', 'BlogController');

Route::resource('user', 'UserController');
Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::get('logout', 'UserController@logout')->name('user.logout');