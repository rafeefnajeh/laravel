@extends('layouts.adminLayout.admin_design')
@section('content')

  
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1> Student Tables</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title">
           <span class="icon"><i class="icon-th"></i></span>
           <a class="btn btn-success " href="/admin/student/create" style="float:right;margin-top:3px; margin-right:10px;">New Student</a>
            <h5>student table</h5>
          </div>
          <div class=" table-responsive-sm" style="overflow-x:auto;">
            <table class="table  table-hover data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>User Name</th>
                  <th>phone</th>
                  <th>Email</th>
                  <th>ID Number</th>
                  <th>Address</th>
                  <th>Birth date</th>
                  <th>Organization</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($students as $student)
                <tr class="gradeX ">
                  <td>{{$student->id}}</td>
                  <td>{{$student->full_name}}</td>
                  <td>{{$student->gender}}</td>
                  <td>{{$student->username}}</td>
                  <td>{{$student->phone}}</td>
                  <td>{{$student->email}}</td>
                  <td>{{$student->IDN}}</td>
                  <td>{{$student->address}}</td>
                  <td>{{$student->birth_date}}</td>
                  <td>{{$student->organization->name_org}}</td>
                  <td class="center">
                  <form action="{{route('student.destroy',$student->id)}}" method="post">
                  <a class="btn btn-success" href="{{route('student.show',$student->id)}}">Add</a>
                    <a class="btn btn-primary" href="{{route('student.edit',$student->id)}}">Edit</a>
                    
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
                 
                  
               
                  
              