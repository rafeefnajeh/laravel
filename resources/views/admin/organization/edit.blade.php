
@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="#">Organization</a> <a href="#" class="current">Update Organization</a> </div>
    <h1>Update Organization</h1>
  </div>
 
          <div class="container-fluid"><hr>
            <div class="row-fluid">
              <div class="span12">
              <div class="widget-box">
            <form class="form-horizontal" method="post" action="{{route('organization.update',$organization->id)}}" name="add_courses" id="add_courses" novalidate="novalidate">
               <fieldset>
                 <legend>Personalia Information</legend>
                 @csrf
                 @method('PATCH')
              <!-- <div class="control-group"> -->
                <label class="control-label">Full Name</label>
                <div class="controls">
                  <input type="text" name="full_name" id="full_name" value='{{$organization->full_name}}'>
                </div>
                <div class="control-group">
                    <label class="control-label">Birth of Date</label>
                    <div class="controls">
                      <input type="date" name="date" id="date" value="{{$organization->birth_date}}">
                    </div>
                 </div>
                 <div class="control-group">
                    <label class="control-label">ID Number</label>
                    <div class="controls">
                      <input type="text" name="IDN" id="IDN" value="{{$organization->IDN}}">
                    </div>
                 </div>
                <div class="control-group">
                  <label class="control-label">Gender</label>
                    <div class="controls">
                      <select name='gender' style="width:220px;">
                        <option value='fmale' {{ $organization->gender === 'fmale' ? 'selected' : '' }}>Fmale</option>
                        <option value='male' {{ $organization->gender === 'male' ? 'selected' : '' }}>Male</option>
                      </select>
                    </div>
                    <fieldset>
                 <legend>Account Information</legend>
                    <!-- <div class="control-group"> -->
                      <label class="control-label">Email</label>
                         <div class="controls">
                          <input type="email" name='email'  value='{{$organization->email}}' id='email'/>
                         </div>
                         <div class="control-group">
                      <label class="control-label">User Name</label>
                         <div class="controls">
                          <input type="text" name='username' id='username'  value='{{$organization->username}}'/>
                         </div>
                        
                    <fieldset>
                      <legend>Contact Information</legend>
                        <!-- <div class="control-group"> -->
                           <label class="control-label">Address</label>
                            <div class="controls">
                              <input type="text" name='address' id='address'  value='{{$organization->address}}' />
                            </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label">Phone</label>
                            <div class="controls">
                              <input type="text" name='phone' id='phone' value='{{$organization->phone}}'/>
                            </div>
                        </div>
                        <fieldset>
                      <legend>Organization Information</legend>
                        <!-- <div class="control-group"> -->
                           <label class="control-label">Name Organization</label>
                            <div class="controls">
                              <input type="text" name='name_org' id='name_org'  value='{{$organization->name_org}}'/>
                            </div>
                        </div>
                       <input type="hidden" value="20" name="role_id">
                       <input type="hidden" name="user_id" id="email" value='{{$organization->user_id}}'>
                        <input type="hidden" name="contact_id" id="email" value='{{$organization->contact_id}}'>
                        <input type="hidden" name="organization_id"  value='{{$organization->id}}'>

                    <div class="form-actions">
                      <input type="submit" value="Update Organization" class="btn btn-success">
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

