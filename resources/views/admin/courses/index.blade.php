@extends('layouts.adminLayout.admin_design')
@section('content')

  
  <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables Courses</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <a class="btn btn-success " href="/admin/courses/create" style="float:right;margin-top:3px; margin-right:10px;">New Courses</a>
            <h5>Table Courses</h5>
          </div>
          <div class=" table-responsive-sm" style="overflow-x:auto;">
            <table class="table  table-hover data-table table-bordered ">
              <thead>
                <tr>
                  <th>Courses ID</th>
                  <th>Courses Name</th>
                  <th>Level</th>
                  <th>Description</th>
                  <th>Outline</th>
                  <th>Number Of Hours</th>
                  <th>Cost</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody >
                @foreach($courses as $course)
                <tr class="gradeX ">
                  <td>{{$course->id}}</td>
                  <td>{{$course->courses_name}}</td>
                  <td>
                  @foreach($course->level as $level)
                      <label>{{$level->level_name}}</label>
                  @endforeach
                  </td>
                  <td>{{$course->courses_description}}</td>
                  <td>
                  @if($course->courses_outline != 'no file')
                  <a href='/storage/courses_outline/{{$course->courses_outline}}'>{{$course->courses_outline}}</a>
                  @else
                  {{$course->courses_outline}}
                  @endif
                  </td>
                  <td>{{$course->hours}}</td>
                  <td>{{$course->cost}}</td>
                  
                  <td class="center">
                  <form action="{{route('courses.destroy',$course->id)}}" method="post">
                    <a class="btn btn-primary" href="{{route('courses.edit',$course->id)}}">Edit</a>
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