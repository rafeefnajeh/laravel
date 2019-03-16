@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="#"> Courses</a> <a href="#" class="current">Add  Courses</a> </div>
    <h1>Add Courses</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon icon-plus"> <i class="icon-info-list"></i> </span>
            <h5>Add Courses</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('courses.store')}}"  enctype="multipart/form-data" novalidate="novalidate">
              @csrf
              <div class="control-group">
                <label class="control-label"> Courses Name</label>
                <div class="controls">
                  <input type="text" name="courses_name" id="courses_name">
                </div>
                </div>
                <div class="control-group">
                <label class="control-label">Level of Courses</label>
                <div class="controls">
                <select name='level[]' style="width:220px;" multiple="multiple">
                     @foreach( $levels as $level )
                         <option value="{{$level->id}}">{{$level->level_name}}</option>
                     @endforeach
                                      
                   </select>
                      
                  
                </div>
                </div>
                <div class="control-group">
                <label class="control-label"> Courses Description</label>
                <div class="controls">
                  <!-- <input type="text" name="courses_description" id="courses_description"> -->
                  <textarea name="courses_description"></textarea>
                </div>
               </div>
               <div class="control-group">
              <label class="control-label">File upload input</label>
              <div class="controls">
                <input type="file" name='courses_outline' id='courses_outline'/>
              </div>
                <div class="control-group">
                <label class="control-label">Number of hours</label>
                <div class="controls">
                  <input type="number" name="hours" id="hours">
                </div>
                </div>
                <div class="control-group">
                <label class="control-label">Courses Cost</label>
                <div class="controls">
                  <input type="number" name="cost" id="cost">
                </div>
                </div>
                
                

              <div class="form-actions">
                <input type="submit" value="Add Courses" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>


@endsection