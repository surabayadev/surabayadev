<?php

namespace App\Http\Controllers\Api\v1;
use Illuminate\Support\Str;
use App\Models\KategoriBlog;
use App\Http\Controllers\Api\v1\BaseApiController;

class CategoryController extends BaseApiController
{

    public function __construct()
    {
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = KategoriBlog::all();
        return response()->json($category);
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
            'name'      => 'required',
            'title'     => 'required',
            'description'  => 'required',
        ]);
        $category = new KategoriBlog();
            if (auth()->check()) {
                $category->user_id = auth()->user()->id;
            }
            else{
                $category->user_id = 1;
            }

            $category->title = $request->title;
            $category->slug =Str::slug($request->get('title'));
            $category->description = $request->description;
            $category->save();
            return response()->json([
                'message' => 'berhasil dibuat'
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
        $category = KategoriBlog::where('slug',$slug)->first();
        return response()->json($category);
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
            'name'      => 'required',
            'title'     => 'required',
            'description'  => 'required',
        ]);
            $category = KategoriBlog::where('slug',$slug)->first();
            if (auth()->check()) {
                $category->user_id = auth()->user()->id;
            }
            else{
                $category->user_id = 1;
            }
            $category->title = $request->title;
            $category->slug =Str::slug($request->get('title'));
            $category->description = $request->description;
          $category->save();
          return response()->json([
            'message' => 'category berhasil diupdate'
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
        KategoriBlog::find($id)->delete();

        return response()->json([
          'message' => ' category berhasil dihapus'
      ]);
    }
}