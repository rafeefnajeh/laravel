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
            <form class="form-horizontal" method="post" action="{{route('post_courses.store')}}"  enctype="multipart/form-data" novalidate="novalidate">
              @csrf
              <div class="control-group">
                <label class="control-label"> Title</label>
                <div class="controls">
                  <input type="text" name="title" id="title">
                </div>
                </div>
                <div class="control-group">
                <label class="control-label">Body</label>
                <div class="controls">
                <textarea name='body' class="form-control mt-3" rows="5" id="article-ckeditor"></textarea>
                </div>
                </div>               
               <div class="control-group">
              <label class="control-label">File upload input</label>
              <div class="controls">
                <input type="file" name='path' id='path'/>
              </div>
               
                
                

              <div class="form-actions">
                <input type="submit" value="Add Post" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>


@endsection