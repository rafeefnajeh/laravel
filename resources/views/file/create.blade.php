
@extends('layouts.frontLayout.front_design')
@section('content')

 <div class="card my-create  mt-5">
        <div class="card-body ">
            <h3 class="text-center">Upload File</h3>
            <form method="POST" action="{{route('file.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
               
                    <input name='title' class='form-control mt-3' type="text" placeholder="Title">
                    <textarea name='body' class="form-control textarea_editor  mt-3" rows="5" placeholder="Enter text ..." id="body"></textarea>
                    <select name='post_id'  id='post_id' style="width:220px;" class='form-control mt-3'>
                                  @foreach($posts as $post)
                                  <option value="{{$post->id}}">{{$post->title}}</option>
                                @endforeach
                                </select>
                    <input type="file" name='path_file' id='path_file' class='form-control-file mt-3'/>

                    <button class="btn  btn-success  mt-3" name="save" > Upload</button>

                </div>
            </form>
        </div>
    </div>


@endsection