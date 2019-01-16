<?php

use App\Http\Controllers\Api\v1\BlogController;
use App\Http\Controllers\Api\v1\EventController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('event', 'EventController');
Route::resource('participant', 'ParticipantController');
Route::post('participant/{slug}/create', 'ParticipantController@store');
Route::get('all_participant/{slug}', 'ParticipantController@pesertaEvent');
Route::resource('blog', 'BlogController');
