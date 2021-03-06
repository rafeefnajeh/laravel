@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="#">Question</a> <a href="#" class="current">Add  Question</a> </div>
    <h1>Add Question</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon icon-plus"></i> </span>
            <h5>Update Question</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('questions.update',$question->id)}}">
              @csrf
              @method('PATCH')
              <div class="control-group">
                <label class="control-label">Select Courses</label>
                <div class="controls">
                   <select name='courses_id' style="width:220px;">
                               @foreach( $courses as $course)
                               
                                     <option  value="{{$course->id}}">{{$course->courses_name}}</option>
                               
                          @endforeach
                     </select>
                          
                        
                </div>
              </div>
              <div class="control-group">
                  <label class="control-label">Question text*</label>
                      <div class="controls">
                          <textarea name='question_text' id='question_text' >{{ $question->question_text}}</textarea>
                      </div>
             </div>
           
            
              <div class="control-group">
                  <label class="control-label">Code Snippet</label>
                      <div class="controls">
                          <textarea name='code_snippet' id='code_snippet' ></textarea>
                      </div>
             </div>
             <div class="control-group">
                  <label class="control-label">Answer explanation*</label>
                      <div class="controls">
                          <textarea name='answer_explanation' id='answer_explanation' >{{ $question->answer_explanation}}</textarea>
                      </div>
             </div>
             <div class="control-group">
                  <label class="control-label">More info link</label>
                      <div class="controls">
                      <input type="text" name='more_info_link' id='more_info_link' value="{{ $question->more_info_link}}"/>
                      </div>
             </div>
              <div class="form-actions">
                <input type="submit" value="Update Question" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>



@endsection


    

