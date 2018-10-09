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

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
// Route::get('resend-email', 'Auth\RegisterController@resendEmail')->name('resendEmail');
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/events', function () {
    return view('event');
})->name('event');

Route::get('/preorder/polo', function () {
	$gform = 'https://docs.google.com/forms/d/e/1FAIpQLScWSMYTWnGAK5UoJeOucPSWSFO9m_Q6mfLcJOcKoujbdsc21w/viewform';
    return view('preorder', compact('gform'));
});

Route::get('/preorder/paketpolo', function () {
	$gform = 'https://docs.google.com/forms/d/e/1FAIpQLSdyFrwCu6eDHlZmB_T_tSOQK0meDSdrsm_gsYt4YHok3QE2RQ/viewform';
    return view('preorder', compact('gform'));
});

Route::get('/preorder/kaos', function () {
	$gform = 'https://docs.google.com/forms/d/e/1FAIpQLSdx4xPoIngv7yHfX68kcZjQEUIGbSTBCtUgcM3VBfUqj-4erA/viewform';
    return view('preorder', compact('gform'));
});

Route::get('/preorder/paketkaos', function () {
	$gform = 'https://docs.google.com/forms/d/e/1FAIpQLSfVeCBe5CLqZWGn6vz6JMgY_iWjvLRgnhJ_RO9l64DG657HZg/viewform';
    return view('preorder', compact('gform'));
});

Route::get('/members', function () {
    return 'members page';
})->name('member');
