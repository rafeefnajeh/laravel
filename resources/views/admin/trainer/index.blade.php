@extends('layouts.adminLayout.admin_design')
@section('content')

  
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables Trainers</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <a class="btn btn-success " href="/admin/trainer/create" style="float:right;margin-top:3px; margin-right:10px;">New Trainer</a>
            <h5>Table Trainer</h5>
          </div>
          <div class=" table-responsive-sm" style="overflow-x:auto;">
            <table class="table  table-hover data-table">
              <thead>
                <tr>
                <th>ID  </th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>User Name</th>
                  <th>phone</th>
                  <th>Email</th>
                  <th>ID Number</th>
                  <th>Address</th>
                  <th>Birth date</th>
                  <th>Field</th>
                  <th>Courses</th>
                  <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($trainers as $trainer)
                <tr class="gradeX">
                  <td>{{$trainer->id}}</td>
                  <td>{{$trainer->full_name}}</td>
                  <td>{{$trainer->gender}}</td>
                  <td>{{$trainer->username}}</td>
                  <td>{{$trainer->phone}}</td>
                  <td>{{$trainer->email}}</td>
                  <td>{{$trainer->IDN}}</td>
                  <td>{{$trainer->address}}</td>
                  <td>{{$trainer->birth_date}}</td>
                  <td>{{$trainer->field}}</td>
                  <td>
                  @foreach($trainer->courses as $course)
                      <label>{{$course->courses_name}}</label>
                  @endforeach
                 </td>
                  <td class="text-center">
                  <form action="{{route('trainer.destroy',$trainer->id)}}" method="post">
                  <a class="btn btn-primary" href="{{route('trainer.edit',$trainer->id)}}">Edit</a>
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