<?php

namespace App\Http\Controllers\Api\v1;

use Validator;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventParticipant;
use App\Http\Controllers\Controller;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participant = EventParticipant::orderBy('id', 'desc')->get();
        // dd($participant);
        return response()->json([
            'participant' => $participant
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'notelp' => 'required',
            'status' => 'required',
            'asal_institusi' => 'required|string'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $participant = new EventParticipant;
       
        $participant->event_id = Event::where('slug', $slug)->first()->id;
      
        $participant->email = $request->email;
        $participant->nama_lengkap = $request->nama_lengkap;
        $participant->notelp = $request->notelp;
        $participant->status = $request->status;
        $participant->asal_institusi = $request->asal_institusi;
        $participant->id_telegram = $request->id_telegram;
        $participant->sumber_info = $request->sumber_info;

        $participant->save();
        return response()->json([
            'message' => 'Peserta behasil mendaftar'
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
        $participant = EventParticipant::find($id);
        return response()->json($participant);
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

        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string',
            'email' => 'required|email',
            'notelp' => 'required',
            'status' => 'required',
            'asal_institusi' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $participant = EventParticipant::find($id);
       
        $participant->email = $request->email;
        $participant->nama_lengkap = $request->nama_lengkap;
        $participant->notelp = $request->notelp;
        $participant->status = $request->status;
        $participant->asal_institusi = $request->asal_institusi;
        $participant->id_telegram = $request->id_telegram;
        $participant->sumber_info = $request->sumber_info;

        $participant->save();
        return response()->json([
            'message' => 'Data peserta behasil diupdate'
        ]);

    }

    public function pesertaEvent($slug)
    {
        // $slug2 = $slug;
        $GLOBALS['slug'] = $slug;
        $participant = EventParticipant::whereHas('event', function($query){
            $query->where('slug', $GLOBALS['slug']);
        })->get();

        return response()->json([
            'participant' => $participant
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
        EventParticipant::find($id)->delete();
        return response()->json([
            'message' => 'Peserta behasil dihapus'
        ]);
    }
}
