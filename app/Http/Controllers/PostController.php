<?php

namespace App\Http\Controllers;

use App\Post;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::all();
       // print_r($posts);
//exit;
        return view('post_courses.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post_courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('path')){
            //Get file name with extension
            $filenameWithExt = $request->file('path')->getClientOriginalName();
            //Get just filename
            $fileName =pathinfo( $filenameWithExt,PATHINFO_FILENAME );
            //Get just Extension
           $Extension= $request->file('path')->getClientOriginalExtension();
           // file name to store
           $fileNameToStore = $fileName.'_'.'.'. $Extension;
           //Upload file
           $path = $request->file('path')->storeAs('public/path',$fileNameToStore);
       }else{
           $fileNameToStore = 'no file';
       }
        $post = new Post([
            'title'=>$request->input('title'),
              'body'=>$request->input('body'),
              'path' => $fileNameToStore,
          ]);
          $post->save();
          return redirect('/post_courses')->with('Success','Has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $post = Post::find($id);
        $files =File::all();
        $files = $files->where('post_id', '=', $id);
        
        return view('post_courses.show',compact('post','files','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
