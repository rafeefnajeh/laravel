@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="#">Location</a> <a href="#" class="current">Add  Location</a> </div>
    <h1>Add Location</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon icon-plus"></i> </span>
            <h5>Add Location</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('location.store')}}" name="add_courses" id="add_courses" novalidate="novalidate">
              @csrf
              <div class="control-group">
                <label class="control-label">Name Location</label>
                <div class="controls">
                  <input type="text" name="name_location" id="name_location">
                </div>
              </div>

              <div class="form-actions">
                <input type="submit" value="Add Location" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>


@endsection