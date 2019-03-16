@extends('layouts.adminLayout.admin_design')
@section('content')

  
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Courses  Student Tables</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>student table</h5>
          </div>
          <div class=" table-responsive-sm" style="overflow-x:auto;">
            <table class="table  table-hover data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Courses</th>
                  <th>Level</th>
                  <th>Start_date</th>
                  <th>Time</th>
                  <th>Trainer</th>
                  <th>Location</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($courses_students as $courses_student)
                <tr class="gradeX ">
                  <td>{{$courses_student->c_s_id}}</td>
                  <td>{{$courses_student->full_name}}</td>
                  <td>{{$courses_student->courses_name}}</td>
                  <td>{{$courses_student->level_name}}</td>
                  <td>{{$courses_student->start_date}}</td>
                  <td>{{$courses_student->time}}</td>
                  <td>{{$courses_student->trainer_name}}</td>
                  <td>{{$courses_student->name_location}}</td>
                  <td class="center">
                  <form action="{{route('student.destroy0',$courses_student->c_s_id)}}" method="post">
                    
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
                 
                  
               
                  
              