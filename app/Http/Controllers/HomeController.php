<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Testimony;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::where('status', 1)->latest()->limit(3)->get();
        $pastEvents = Event::byPast()->get();
        $upcomingEvent = Event::byUpcoming()->first();
        // return $pastEvents;
        // return $upcomingEvent;

        $data = [
            'title' => 'Home',
            'testimonies' => $testimonies,
            'pastEvents' => $pastEvents,
            'upcomingEvent' => $upcomingEvent,
        ];
        return view('theme::contents.home', $data);
    }
}
