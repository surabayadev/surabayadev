<?php

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->name('logs');

Route::get('/', 'DashboardController@index')->name('dashboard');

// Events
Route::get('/event/participants/{id}', 'EventController@participants')->name('event.participants');
Route::resource('event', 'EventController');
// End Events


Route::resource('category', 'CategoryController');


Route::resource('blog', 'BlogController');


Route::resource('testimonies', 'TestimonyController');


Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::resource('user', 'UserController');
Route::get('logout', 'UserController@logout')->name('user.logout');
