<?php

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');

Route::get('/', 'DashboardController@index')->name('dashboard');
Route::resource('event', 'EventController');


Route::resource('category', 'CategoryController');


Route::resource('blog', 'BlogController');


Route::get('testimonies', 'TestimonyController@index')->name('testimony.index');


Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::resource('user', 'UserController');
Route::get('logout', 'UserController@logout')->name('user.logout');
