@extends('layouts.frontLayout.front_design')
@section('content')

  
  <div id="content" class='mt-5'>
  <div id="content-header" class='container'>
    <div id="breadcrumb"> </div>
    <a class="btn btn-primary" href="{{route('file.create')}}">Upload Material</a>
    <a class="btn btn-success" href="{{route('file.index')}}">View Material</a>
  </div>
  <div class="container">
    <!-- <hr> -->
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
         
          <div class="widget-content nopadding mt-3" >
            <table class="table table-striped">
              <thead>
                <tr class='text-center'>
                <th>Full Name</th>
                  <th>Courses</th>
                  
                  <th>Level Name</th>
                  <th>Start Date</th>
                  <th>Time</th>
                  <th>Location</th>
                  </tr>
              </thead>
              <tbody>
              @foreach($trainer_courses as $course)
                <tr class="gradeX">
                <td class="text-center">{{$course->full_name}}</td>
                  <td class="text-center">{{$course->courses_name}}</td>
                  <td class="text-center">{{$course->level_name}}</td>
                  <td class="text-center">{{$course->start_date}}</td>
                  <td class="text-center">{{$course->time}}</td>
                  <td class="text-center">{{$course->name_location}}</td>
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
                 
                  
               
                  
              



