<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\EventDocumentaion;
use App\Http\Controllers\Controller;

class EventDocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentations = EventDocumentaion::orderBy('id', 'DESC')->get();

        return response()->json([
            'documentation' => $documentations
        ]);
    }

    public function documentation($slug)
    {
        $GLOBALS['slug'] = $slug;
        $documentations = EventDocumentaion::whereHas('event', function($query){
            $query->where('slug', $GLOBALS['slug']);
        })->get();

        return response()->json([
            'documentations' => $documentations
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
        $documentation = new EventDocumentaion;
        $documentation->event_id = Event::where('slug', $slug)->first()->id;

        if($request->hasFile('photo')){
            $documentation->photo = $request->file('photo')->getClientOriginalName();
            $photo = $request->file('photo');
            $namaphoto = $photo->getClientOriginalName();
            $path = $photo->move(public_path('/img'), $namaphoto);
        }

        $documentation->save();

        return response()->json([
            'message' => 'Documentasi berhasil dibuat'
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
        //
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
        
        $documentation = EventDocumentaion::find($id);
      
        if($request->hasFile('photo')){
            $documentation->photo = $request->file('photo')->getClientOriginalName();
            $photo = $request->file('photo');
            $namaphoto = $photo->getClientOriginalName();
            $path = $photo->move(public_path('/img'), $namaphoto);
        }

        $documentation->save();

        return response()->json([
            'message' => 'Documentasi berhasil diupdate'
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
        EventDocumentaion::find($id)->delete();
        return response()->json([
            'message' => 'Documentasi berhasil dihapus'
        ]);
    }
}
