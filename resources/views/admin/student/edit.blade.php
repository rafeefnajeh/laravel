
@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="#">Student</a> <a href="#" class="current">Update Student</a> </div>
    <h1>Update Student</h1>
  </div>
 
          <div class="container-fluid"><hr>
            <div class="row-fluid">
              <div class="span12">
              <div class="widget-box">
            <form class="form-horizontal" method="post" action="{{route('student.update',$student->id)}}" name="add_courses" id="add_courses" novalidate="novalidate">
               <fieldset>
                 <legend>Personalia Information</legend>
                 @csrf
                 @method('PATCH')
                 <label class="control-label">Full Name</label>
                <div class="controls">
                  <input type="text" name="full_name" id="full_name" value='{{$student->full_name}}'>
                </div>
                <div class="control-group">
                    <label class="control-label">Birth of Date</label>
                    <div class="controls">
                      <input type="date" name="date" id="date" value="{{$student->birth_date}}">
                    </div>
                 </div>
                 <div class="control-group">
                    <label class="control-label">ID Number</label>
                    <div class="controls">
                      <input type="text" name="IDN" id="IDN" value="{{$student->IDN}}">
                    </div>
                 </div>
                <div class="control-group">
                  <label class="control-label">Gender</label>
                    <div class="controls">
                      <select name='gender' style="width:220px;">
                        <option value='fmale' {{ $student->gender === 'fmale' ? 'selected' : '' }}>Fmale</option>
                        <option value='male' {{$student->gender === 'male' ? 'selected' : '' }}>Male</option>
                      </select>
                    </div>
                    <fieldset>
                 <legend>Account Information</legend>
                    <!-- <div class="control-group"> -->
                      <label class="control-label">Email</label>
                         <div class="controls">
                          <input type="email" name='email'  value='{{$student->email}}' id='email'/>
                         </div>
                         <div class="control-group">
                      <label class="control-label">User Name</label>
                         <div class="controls">
                          <input type="text" name='username' id='username'  value='{{$student->username}}'/>
                         </div>
                        
                    <fieldset>
                      <legend>Contact Information</legend>
                        <!-- <div class="control-group"> -->
                           <label class="control-label">Address</label>
                            <div class="controls">
                              <input type="text" name='address' id='address'  value='{{$student->address}}' />
                            </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label">Phone</label>
                            <div class="controls">
                              <input type="text" name='phone' id='phone' value='{{$student->phone}}'/>
                            </div>
                        </div>
                        <fieldset>
                      <legend>Student Information</legend>
                        <!-- <div class="control-group"> -->
                           <label class="control-label">Name Organization</label>
                            <div class="controls">
                            <select name='organization_id' style="width:220px;">
                               @foreach( $organizations as $organization)
                                  @if($organization->id == $student->organization->id)
                                     <option selected value="{{$organization->id}}">{{$organization->name_org}}</option>
                                 @else
                                    <option value="{{$organization->id}}">{{$organization->name_org}}</option>
                                 @endif
                          @endforeach
                          </select>
                            </div>
                        </div>
                       
                       <input type="hidden" name="user_id"  value='{{$student->user_id}}'>
                        <input type="hidden" name="contact_id"  value='{{$student->contact_id}}'>
                        <input type="hidden" name="student_id"  value='{{$student->id}}'>

                    <div class="form-actions">
                      <input type="submit" value="Update Student" class="btn btn-success">
                    </div>
                      </fieldset>
                  </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>

@endsection

