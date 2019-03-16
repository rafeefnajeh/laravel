@extends('layouts.frontLayout.front_design')
@section('content')

@foreach($files as $file)
<div class="card mt-5">

  <h5 class="card-header bg-primary">{{$file->title}}</h5>
  <div class="card-body">
    <p class="card-text">{{$file->body}}</p>
       @if($file->path_file != 'no file')
         <a href='/storage/path_file/{{$file->path_file}}' style="color:#00f;">{{$file->path_file}}</a>
                  @else
                  {{$file->path_file}}
                  @endif
  </div>
  
</div>
@endforeach

@endsection