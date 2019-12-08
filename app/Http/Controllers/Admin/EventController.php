<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('participants')
            ->withCount('participants')
            ->filterable()
            ->latest('start_date')
            ->paginate(10);
        $data = [
            'title' => 'Event List',
            'events' => $events,
            'eventCount' => Event::count(),
        ];
        return view('admin::contents.events.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Create Event',
            'userDropdown' => User::get()->pluck('name', 'id'),
            'isEdit' => false,
            // 'categoryDropdown' => Category::getDropdown()
        ];
        return view('admin::contents.events.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = $this->processToDatabase($request);

        return redirect()->route('admin.event.index')->withAlert([
            'type' => 'success',
            'title' => 'Successfully created',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $event = Event::findOrFail($id);
        // $data = [
        //     'title' => 'Detail Event: '. $event->name,
        //     'event' => $event
        // ];
        // return view('admin::contents.events.show', $data);
    }
    
    public function participants($id)
    {
        $event = Event::with('participants')->findOrFail($id);
        $data = [
            'title' => 'Participants Event: '. $event->name,
            'event' => $event
        ];
        return view('admin::contents.events.participants', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $data = [
            'title' => 'Edit Event: ' . $event->name,
            'userDropdown' => User::get()->pluck('name', 'id'),
            'event' => $event,
            'isEdit' => true
        ];
        return view('admin::contents.events.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = $this->processToDatabase($request, $id);

        return redirect()->route('admin.event.index');
    }

    protected function processToDatabase(Request $request, $id = null)
    {
        $ignoreId = $id ?: 'NULL';
        $this->validate($request, [
            'name' => 'required',
            'slug' => 'required|alpha_dash|unique:events,slug,' . $ignoreId,
            'participant_limit' => 'required|numeric|min:5',
            'city' => 'required',
            'address' => 'required',
            'description' => 'required',
            // 'content' => 'required',
            'start_date' => 'required|before:' . $request->get('end_date'),
            'end_date' => 'required|after:' . $request->get('start_date'),
            'speakers' => 'required|array'
        ]);

        $request->offsetSet('start_date', Carbon::createFromTimestamp(strtotime($request->get('start_date')))->format('Y-m-d H:i:s'));
        $request->offsetSet('end_date', Carbon::createFromTimestamp(strtotime($request->get('end_date')))->format('Y-m-d H:i:s'));

        $event = $id ? Event::findOrFail($id) : new Event;
        $event->fill($request->all());
        $event->user_id = auth()->user()->id;

        if ($event->ig_hashtag) {
            $event->ig_hashtag_status = 'pending';
        }

        $event->save();

        if (is_array($request->speakers) && !empty($request->speakers)) {
            $speakers = [];
            foreach ($request->speakers as $value) {
                $speakers[$value] = ['role' => 'speaker', 'status' => 1];
            }
            $event->participants()->sync($speakers);
        }

        return $event;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.event.index');
    }
}
