<?php


$phone = 81336643668.0;



// dd('here', $phone, (integer) $phone);

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'SiteController@about')->name('site.about');
Route::get('event', 'EventController@index')->name('event.index');
Route::get('event/{slug}', 'EventController@show')->name('event.show');

// Route::get('blog', 'BlogController@index')->name('blog.index');
// Route::get('blog/{slug}', 'BlogController@show')->name('blog.show');

// Auth::routes();
Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware(['verified'])->group(function () {
    Route::get('/callback/{service}', 'Auth\SocialmediaController@callback');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/edit-profile', 'UserController@edit')->name('profile.edit');
    Route::get('/edit-password', 'UserController@password')->name('profile.password');
    Route::put('/update-profile', 'UserController@update')->name('profile.update');

    Route::put('event/{slug}/join', 'EventController@join')->name('event.join');
    Route::put('event/{slug}/cancel-join', 'EventController@cancelJoin')->name('event.cancelJoin');
});

Route::get('/{username}', 'UserController@show')->name('user.show');
Route::get('/callback', function ($id) {
    dd('helo world');
});
