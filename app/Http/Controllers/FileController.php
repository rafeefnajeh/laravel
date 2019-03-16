<?php

namespace App\Http\Controllers;

use App\File;

use App\Post;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $files = File::all();
       return view('file.index',compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           $posts =Post::all();
           return view('file.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('path_file')){
            //Get file name with extension
            $filenameWithExt = $request->file('path_file')->getClientOriginalName();
            //Get just filename
            $fileName =pathinfo( $filenameWithExt,PATHINFO_FILENAME );
            //Get just Extension
           $Extension= $request->file('path_file')->getClientOriginalExtension();
           // file name to store
           $fileNameToStore = $fileName.'_'.'.'. $Extension;
           //Upload file
           $path = $request->file('path_file')->storeAs('public/path_file',$fileNameToStore);
       }else{
           $fileNameToStore = 'no file';
       }
       $file = new File([
        'title'=>$request->input('title'),
          'body'=>$request->input('body'),
          'post_id'=>$request->input('post_id'),
          'path_file'=> $fileNameToStore
      ]);
      $file->save();
      return redirect('/post_courses')->with('success','has been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $posts =Post::all();
        return view('file.edit',compact('posts','file'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {

        if($request->hasFile('path_file')){
            //Get file name with extension
            $filenameWithExt = $request->file('path_file')->getClientOriginalName();
            //Get just filename
            $fileName =pathinfo( $filenameWithExt,PATHINFO_FILENAME );
            //Get just Extension
           $Extension= $request->file('path_file')->getClientOriginalExtension();
           // file name to store
           $fileNameToStore = $fileName.'_'.'.'. $Extension;
           //Upload file
           $path = $request->file('path_file')->storeAs('public/path_file',$fileNameToStore);
       }
 
          
            $file->title = $request->input('title');
            $file->body = $request->input('body');
            $file->post_id = $request->input('post_id');
            if($request->hasFile('path_file')){
                $file->path_file=   $fileNameToStore;
            }
            $file->save();

            return redirect('/file')->with('Success','Has Been Update');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        return redirect('/file')->with('success','has been Deleted');
    }
}
