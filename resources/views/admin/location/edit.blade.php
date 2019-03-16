@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="#">Location</a> <a href="#" class="current">Update  Location</a> </div>
    <h1>Update Location</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>update Location</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('location.update',$location->id)}}" name="add_courses" id="add_courses" novalidate="novalidate">
            @method('PATCH')
                @csrf
              <div class="control-group">
                <label class="control-label">New Location</label>
                <div class="controls">
                  <input type="text" name="name_location" id="name_location" value='{{ $location->name_location }}'>
                </div>
                <input type="hidden" name="trainer_id"  value='{{$location->id}}'>
            
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