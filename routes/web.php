<?php

use Laravel\Socialite\Facades\Socialite;



Route::get('/coba', function () {
    $event = App\Models\Event::find(13);
    return dd($event->participants->where('id', 99)->count());
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'SiteController@about')->name('site.about');
Route::get('event', 'EventController@index')->name('event.index');
Route::get('event/{slug}', 'EventController@show')->name('event.show');

// Route::get('blog', 'BlogController@index')->name('blog.index');
// Route::get('blog/{slug}', 'BlogController@show')->name('blog.show');

// Auth::routes();
Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('connect/{social}', 'Auth\LoginSocialController@redirectToProvider')->name('login.social');
Route::get('connect/{social}/callback', 'Auth\LoginSocialController@handleProviderCallback')->name('login.social.callback');

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

Route::get('/static-prend/img/{any}', function ($file) {
    header('Cache-Control: max-age=84600');
    $content = file_get_contents(public_path('static/img/'. $file));
    return response($content)->header('Content-Type', 'image/jp2');
});
