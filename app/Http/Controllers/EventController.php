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
        $event = Event::where('slug', $slug)->firstOrFail();
        $data = [
            'title' => 'Event Detail',
            'event' => $event,
            'speakers' => $event->getSpeakers()
        ];
        return view('theme::contents.event_show', $data);
    }
}
