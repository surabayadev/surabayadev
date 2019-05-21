<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $upcoming = Event::find(1);
        $data = [
            'title' => 'Event',
            'events' => Event::latest()->paginate(15),
            'upcoming' => $upcoming,
            'speakers' => $upcoming->getSpeakers(),
        ];
        return view('theme::contents.event', $data);
    }

    public function show($slug)
    {
        $data = [
            'title' => 'Event Detail'
        ];
        return view('theme::contents.event_show', $data);
    }
}
