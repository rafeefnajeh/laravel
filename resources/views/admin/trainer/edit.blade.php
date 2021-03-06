@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="#">Trainer</a> <a href="#" class="current">Update Trainer</a> </div>
    <h1>Update Trainer</h1>
  </div>
  <div class="container-fluid"><hr>
            <div class="row-fluid">
              <div class="span12">
              <div class="widget-box">
            <form class="form-horizontal" method="post" action="{{route('trainer.update',$trainer->id)}}" name="add_courses" id="add_courses" novalidate="novalidate">
               <fieldset>
                 <legend>Personalia Information</legend>
                 @csrf
                 @method('PATCH')
              <!-- <div class="control-group"> -->
                <label class="control-label">Full Name</label>
                <div class="controls">
                  <input type="text" name="full_name" id="full_name" value='{{$trainer->full_name}}'>
                </div>
                <div class="control-group">
                    <label class="control-label">Birth of Date</label>
                    <div class="controls">
                      <input type="date" name="date" id="date" value="{{$trainer->birth_date}}">
                    </div>
                 </div>
                 <div class="control-group">
                    <label class="control-label">ID Number</label>
                    <div class="controls">
                      <input type="text" name="IDN" id="IDN" value="{{$trainer->IDN}}">
                    </div>
                 </div>
                <div class="control-group">
                  <label class="control-label">Gender</label>
                    <div class="controls">
                      <select name='gender' style="width:220px;">
                        <option value='fmale' {{ $trainer->gender === 'fmale' ? 'selected' : '' }}>Fmale</option>
                        <option value='male' {{ $trainer->gender === 'male' ? 'selected' : '' }}>Male</option>
                      </select>
                    </div>
                    <fieldset>
                 <legend>Account Information</legend>
                    <!-- <div class="control-group"> -->
                      <label class="control-label">Email</label>
                         <div class="controls">
                          <input type="email" name='email'  value='{{$trainer->email}}' id='email'/>
                         </div>
                         <div class="control-group">
                      <label class="control-label">User Name</label>
                         <div class="controls">
                          <input type="text" name='username' id='username'  value='{{$trainer->username}}'/>
                         </div>
                        
                    <fieldset>
                      <legend>Contact Information</legend>
                        <!-- <div class="control-group"> -->
                           <label class="control-label">Address</label>
                            <div class="controls">
                              <input type="text" name='address' id='address'  value='{{$trainer->address}}' />
                            </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label">Phone</label>
                            <div class="controls">
                              <input type="text" name='phone' id='phone' value='{{$trainer->phone}}'/>
                            </div>
                        </div>
                        <fieldset>
                      <legend>Trainer Information</legend>
                        <!-- <div class="control-group"> -->
                           <label class="control-label">Field</label>
                            <div class="controls">
                              <input type="text" name='field' id='field'  value='{{$trainer->field}}'/>
                            </div>
                        </div>
                <div class="control-group">
                <label class="control-label">Courses</label>
                <div class="controls">
                <select name='courses[]' style="width:220px;" multiple="multiple">
                            @foreach( $courses as $course )
                            @if(in_array($course->id, $selectedCourse))
                              <option selected value="{{$course->id}}">{{$course->courses_name}}</option>
                            @else
                            <option value="{{$course->id}}">{{$course->courses_name}}</option>
                            @endif
                          @endforeach
                          </select>
                </div>
                <input type="hidden" name="user_id"  value='{{$trainer->user_id}}'>
                <input type="hidden" name="contact_id"  value='{{$trainer->contact_id}}'>
                <input type="hidden" name="trainer_id"  value='{{$trainer->id}}'>
              </div>

              <div class="form-actions">
                <input type="submit" value="Save update" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>


@endsection