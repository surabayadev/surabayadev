<?php

namespace App\Http\Controllers\Api\v1;

use auth;
use Validator;
use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\v1\BaseApiController;

class EventController extends BaseApiController
{

    public function __construct()
    {
        // code...
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('user')->orderBy('id','desc')->get();
        return response()->json([
            'event' => $events
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'pemateri' => 'required|string',
            'description' => 'required|min:10',
            'content' => 'required|min:10',
            'tanggal' => 'required|string'

        ]);

        $event = new Event;
        if(auth()->check()){
            $event->user_id = auth()->user()->id;
        } else{
            $event->user_id = 1;
        }
        $event->name = $request->name;
        $event->pemateri = $request->pemateri;
        $event->slug = Str::slug($request->name);
        $event->description = $request->description;
        $event->content = $request->content;
        $event->tanggal = Carbon::parse($request->tanggal);

        

        if($request->hasFile('cover')){
            $event->cover = $request->file('cover')->getClientOriginalName();
            $cover = $request->file('cover');
            $namacover = $cover->getClientOriginalName();
            $path = $cover->move(public_path('/img'), $namacover);
        }else{
            $event->cover = 'vuejs.png';
        }

        $event->save();

        return response()->json([
            'message' => 'Event berhasil dibuat'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $event = Event::where('slug', $slug)->first();
        return response()->json($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required|max:255',
            'pemateri' => 'required|string',
            'description' => 'required|min:10',
            'content' => 'required|min:10',
            'tanggal' => 'required|string'

        ]);

        $event = Event::where('slug', $slug)->first();

        if(auth()->check()){
            $event->user_id = auth()->user()->id;
        } else{
            $event->user_id = 1;
        }
        $event->name = $request->name;
        $event->pemateri = $request->pemateri;
        $event->slug = Str::slug($request->name);
        $event->description = $request->description;
        $event->content = $request->content;
        $event->tanggal = Carbon::parse($request->tanggal);

        if($request->hasFile('cover')){
            $event->cover = $request->file('cover')->getClientOriginalName();
            $cover = $request->file('cover');
            $namacover = $cover->getClientOriginalName();
            $path = $cover->move(public_path('/img'), $namacover);
        }else{
            $event->cover = 'vuejs.png';
        }

        $event->save();

        return response()->json([
            'message' => 'Event berhasil diupdate'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::find($id)->delete();

        return response()->json([
            'message' => 'Event berhasil dihapus'
        ]);
    }
}