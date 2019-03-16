@extends('layouts.frontLayout.front_design')
@section('content')

  
  <div id="content" class='mt-5'>
  <div id="content-header" >
    
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
                  <th>Email</th>
                  <th>phone</th>
                  <th>Courses Name</th>
                  <th>Level Name</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($organization as $student)
                <tr class="gradeX">
                  <td  class='text-center'>{{$student->full_name}}</td>
                  <td  class='text-center'>{{$student->email}}</td>
                  <td  class='text-center'>{{$student->phone}}</td>
                  <td  class='text-center'>{{$student->courses_name}}</td>
                  <td  class='text-center'>{{$student->level_name}}</td>
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
                 
                  
               
                  
              



