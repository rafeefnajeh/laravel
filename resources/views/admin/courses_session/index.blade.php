@extends('layouts.adminLayout.admin_design')
@section('content')

  
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom">
      <i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a>
     
     </div>
    <h1>Tables Courses Session</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
 
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <a class="btn btn-success " href="/admin/courses_session/create" style="float:right;margin-top:3px; margin-right:10px;">New Session</a>
            <h5> Session Tables</h5>
          </div>
          <div class=" table-responsive-sm" style="overflow-x:auto;">
            <table class="table  table-hover data-table">
              <thead>
                <tr>
                <th>ID  </th>
                  <th>Start Date</th>
                  <th>Time</th>
                  <th>Student Number</th>
                  <th>Courses</th>
                  <th>Level</th>
                  <th>Trainer</th>
                  <th>Location</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($sessions as $session)
                <tr class="gradeX ">
                  <td>{{$session->session_id}}</td>
                  <td>{{$session->start_date}}</td>
                  <td>{{$session->time}}</td>
                  <td>{{$session->student_no}}</td>
                  <td>{{$session->courses_name}}</td>
                  <td>{{$session->level_name}}</td>
                  <td>{{$session->trainer_name}}</td>
                  <td>{{$session->name_location}}</td>
                
                  <td class="center">
                  <form action="{{route('courses_session.destroy',$session->session_id)}}" method="post">
                    <a class="btn btn-primary" href="{{route('courses_session.edit',$session->session_id)}}">Edit</a>
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
                 
                  
        
                  
              