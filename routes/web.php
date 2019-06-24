<?php

use App\Models\Event;
use InstagramAPI\Instagram;
use App\Jobs\GetImageFromIgHashtag;
use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return redirect()->route('event.index');
    return view('welcome');
});

Route::get('/asdf', function () {
    $i = 0;
    $loop = 0;
    do {
        echo 'satu '. $i . PHP_EOL;
        $loop++;
        $i++;

        if ($i == 5) {
            $loop = 0;
        }
    } while ($loop !== 0);

    // $a = Storage::disk('local')->get('dummy.txt');
    // return response()->json($a);
    // $ev = Event::find(1);
    // $ev->name = 'jancok';
    // dd($ev, $ev->getOriginal('name'), $ev->getAttribute('name'));
});

Route::get('home', 'HomeController@index')->name('home');
Route::get('about', 'SiteController@about')->name('site.about');
Route::get('event', 'EventController@index')->name('event.index');
Route::get('event/{slug}', 'EventController@show')->name('event.show');
// Route::get('blog', 'BlogController@index')->name('blog.index');
// Route::get('blog/{slug}', 'BlogController@show')->name('blog.show');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{username}', 'UserController@show')->name('user.show');
