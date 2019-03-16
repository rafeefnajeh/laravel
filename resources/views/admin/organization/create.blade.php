@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="#">Organization</a> <a href="#" class="current">Add Organization</a> </div>
    <h1>Add Organization</h1>
  </div>
  <!-- <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Personal Information</h5>
          </div>
          <div class="widget-content nopadding"> -->
          <div class="container-fluid">
          <hr>
            <div class="row-fluid">
              <div class="span12">
              <div class="widget-box">
            <form class="form-horizontal" method="post" action="{{route('organization.store')}}" name="add_courses" id="add_courses" novalidate="novalidate">
               <fieldset>
                 <legend>Personalia Information</legend>
                 @csrf
              <!-- <div class="control-group"> -->
                <label class="control-label">Full Name</label>
                <div class="controls">
                  <input type="text" name="full_name" id="full_name">
                </div>
                <div class="control-group">
                    <label class="control-label">Birth of Date</label>
                    <div class="controls">
                      <input type="date" name="date" id="date">
                    </div>
                 </div>
                 <div class="control-group">
                    <label class="control-label">ID Number</label>
                    <div class="controls">
                      <input type="text" name="IDN" id="IDN">
                    </div>
                 </div>
                <div class="control-group">
                  <label class="control-label">Gender</label>
                    <div class="controls">
                      <select name='gender' style="width:220px;">
                        <option value='fmale'>Fmale</option>
                        <option value='male'>Male</option>
                      </select>
                    </div>
                    <fieldset>
                 <legend>Account Information</legend>
                    <!-- <div class="control-group"> -->
                      <label class="control-label">Email</label>
                         <div class="controls">
                          <input type="email" name='email' id='email'/>
                         </div>
                         <div class="control-group">
                      <label class="control-label">User Name</label>
                         <div class="controls">
                          <input type="text" name='username' id='username' />
                         </div>
                         <div class="control-group">
                           <label class="control-label">Password</label>
                            <div class="controls">
                              <input type="text" name='password' id='password' />
                            </div>
                        </div>
                    <fieldset>
                      <legend>Contact Information</legend>
                        <!-- <div class="control-group"> -->
                           <label class="control-label">Address</label>
                            <div class="controls">
                              <input type="text" name='address' id='address' />
                            </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label">Phone</label>
                            <div class="controls">
                              <input type="text" name='phone' id='phone' />
                            </div>
                        </div>
                        <fieldset>
                      <legend>Organization Information</legend>
                        <!-- <div class="control-group"> -->
                           <label class="control-label">Name Organization</label>
                            <div class="controls">
                              <input type="text" name='name_org' id='name_org' />
                            </div>
                        </div>
                    <input type="hidden" value="20" name="role_id">

                    <div class="form-actions">
                      <input type="submit" value="Add Organization" class="btn btn-success">
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