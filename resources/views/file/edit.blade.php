
@extends('layouts.frontLayout.front_design')
@section('content')

 <div class="card my-create  mt-5">
        <div class="card-body ">
            <h3 class="text-center">Upload File</h3>
            <form method="POST" action="{{route('file.update',$file->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
               
                    <input name='title' class='form-control mt-3' type="text" placeholder="Title"  value="{{$file->title}}">
                    <textarea name='body' class="form-control textarea_editor  mt-3" rows="5" placeholder="Enter text ..." id="body">{{$file->body}}</textarea>
                    <select name='post_id'  id='post_id' style="width:220px;" class='form-control mt-3'>
                                  @foreach($posts as $post)
                                    @if($post->id == $file->post->id)
                                     <option selected value="{{$post->id}}">{{$post->title}}</option>
                                     @else
                                     <option  value="{{$post->id}}">{{$post->title}}</option>
                                     @endif
                                @endforeach
                                </select>
                    <input type="file" name='path_file' id='path_file' class='form-control-file mt-3'/>

                    <button class="btn  btn-success  mt-3" name="save" > Upload</button>

                </div>
            </form>
        </div>
    </div>


@endsection