@extends('layouts.frontLayout.front_design')
@section('content')

  
  <div id="content">
  <div id="content-header" class='container'>
    <div id="breadcrumb"> </div>
    <h1>Tables</h1>
  </div>
  <div class="container">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Courses</th>
                  <th>Full Name</th>
                  <th>Start Date</th>
                  <th>Time</th>
                  <th>Level Name</th>
            

                  </tr>
              </thead>
              <tbody>
              @foreach($student as $course)
                <tr class="gradeX">
                <td>{{$course->courses_name}}</td>
                <td>{{$course->full_name}}</td>
                <td>{{$course->start_date}}</td>
                <td>{{$course->time}}</td>
                <td>{{$course->level_name}}</td>
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
                 
                  
               
                  
              



