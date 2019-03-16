@extends('layouts.frontLayout.front_design')
@section('content')

  <div class="row">
  @foreach($posts as $post)
    <div class="card-deck col-md-4 mt-5 ">
      <div class="card ">
      <h5 class="card-header bg-primary"><a href="/post_courses/{{$post->id}}"> {{$post->title}}</a></h5>

        <div class="card-body">
        <img class="card-img-top " src="/storage/path/{{$post->path}}" alt="{{$post->title}}">
          
          <p class="card-text mt-2 text-center">{{$post->body}}</p>
        </div>
        <div class="card-footer bg-dark "><small class="text-muted">Last updated {{$post->updated_at}}</small></div>
      </div>
      </div>
      @endforeach
     
     

@endsection