<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $upcoming = Event::find(1);
        $data = [
            'title' => 'Event',
            'events' => Event::latest()->paginate(5),
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

    public function join($slug, Request $request)
    {
        $auth = auth()->user();
        if (!$auth) {
            return redirect()->route('login');
        }

        $event = Event::where('slug', $slug)->firstOrFail();
        if ($auth->hasJoined($event)) {
            return redirect()->route('event.show', $event->slug)->with('alert', [
                'type' => 'success',
                'title' => 'You already join this event',
            ]);
        }
        
        $auth->joinEvent($event, Event::PARTICIPANT_ROLE_MEMBER);

        return redirect()->route('event.show', $event->slug)->with('alert', [
            'type' => 'success',
            'title' => 'Join Successfully!',
            'content' => 'Hi '. $auth->name .', Thanks for your participation to this Event!'
        ]);
    }

    public function cancelJoin($slug, Request $request)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        auth()->user()->leaveEvent($event);

        return redirect()->route('event.show', $event->slug)->with('alert', [
            'type' => 'info',
            'title' => 'Cancel Join Success',
            'content' => 'Sadly to hear you not join this event.'
        ]);
    }
}
