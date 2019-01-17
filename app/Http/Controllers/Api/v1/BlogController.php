<?php

namespace App\Http\Controllers\Api\v1;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Http\Middleware\newMiddleware;
use App\Models\KategoriBlog;
use App\Http\Controllers\Api\v1\BaseApiController;

class BlogController extends BaseApiController
{

    public function __construct()
    {
    //    $this->middleware('newMiddleware');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return $blog;
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
            'content'  => 'required',
            'editor_type' => 'required'
        ]);
        $category = KategoriBlogg::all();
        $blog = new Blog();
            if (auth()->check()) {
                $blog->user_id = auth()->user()->id;
            }
            else{
                $blog->user_id = 1;
            }
            $blog->category_id = $request->category_id;
            $blog->name = $request->name;
            $blog->editor_type = $request->editor_type;
            $blog->title = $request->title;
            $blog->content = $request->content;
            $blog->slug =Str::slug($request->get('title'));
            if($request->hasFile('image')){
                $blog->image = $request->file('image')->getClientOriginalName();
                $foto = $request->file('image');
                $namaFoto = $foto->getClientOriginalName();
                $path = $foto->move(public_path('/images'), $namaFoto);
            }

        $blog->save();
        $params = [
            'blog' => $blog,
            'category' => $category
        ];
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
        $blog = Blog::where('slug',$slug)->first();
        return response()->json($blog);
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
            'name'=>'required',
            'content'=> 'required',
            'editor_type' => 'required'
          ]);
            $blog = Blog::where('slug',$slug)->first();
            if (auth()->check()) {
                $blog->user_id = auth()->user()->id;
            }
            else{
                $blog->user_id = 1;
            }
          $blog->name = $request->name;
          $blog->editor_type = $request->editor_type;
          $blog->content = $request->content;
          $blog->category_id = $request->category_id;
          $blog->slug =Str::slug($request->get('title'));
          if ($request->hasfile('image')) {
              $blog->image = $request->file('image')->getclientOriginalName();
              $image = $request->file('image');
              $namaimage = $image->getClientOriginalName();
              $path = $image->move(public_path('/img'),$namaimage);
          }
          $blog->save();
          return response()->json([
            'message' => 'blog berhasil diupdate'
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
      Blog::find($id)->delete();

      return response()->json([
        'message' => ' blog berhasil dihapus'
    ]);
    }
}