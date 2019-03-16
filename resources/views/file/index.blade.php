@extends('layouts.frontLayout.front_design')
@section('content')

  
<div id="content" class='mt-5'>
  <div id="content-header" class='container'>
   <h2>File Material</h2>
  </div>
  <div class="container">
  <a class="btn btn-success " href="/file/create" style="float:right;margin-top:3px; margin-right:10px;">New File</a>
    <!-- <hr> -->
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
         
          <div class="widget-content nopadding mt-3" >
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>Title</th>
                  <th>Body</th>
                  <th>Section</th>
                  <th>File</th>
                  <th>Action</th>
                 
            

                  </tr>
              </thead>
              <tbody>
              @foreach($files as $file)
                <tr class="text-center">
                <td>{{$file->title}}</td>
                <td>{{$file->body}}</td>
                <td>{{$file->post->title}}</td>
                <td>{{$file->path_file}}</td>
                <td>
                   <form action="{{route('file.destroy',$file->id)}}" method="post">
                    <a class="btn btn-primary" href="{{route('file.edit',$file->id)}}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                    
                </tr>
              @endforeach
                
              </tbody>
             
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>     


@endsection
                 
                  
               
                  
              



   
                  
               
                  
              



