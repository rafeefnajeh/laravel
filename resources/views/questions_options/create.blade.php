@extends('layouts.adminLayout.admin_design')
@section('content')


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="#">Question Options</a> <a href="#" class="current">Add  Question</a> </div>
    <h1>Add Question Options</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon icon-plus"></i> </span>
            <h5>Add Question</h5>
          </div>
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{route('questions_options.store')}}">
              @csrf
              <div class="control-group">
                <label class="control-label">Select Question</label>
                <div class="controls">
                  <select name="question_id" id="question_id" style="width:220px;">
                      @foreach($questions as $question)
                         <option value="{{$question->id}}">{{$question->question_text}}</option>
                      @endforeach
                  </select>
                 
                </div>
              </div>
             
             <div class="control-group">
                  <label class="control-label">Option </label>
                      <div class="controls">
                      <input type="text" name='option' id='option' />
                      </div>
             </div>
           
             <div class="control-group">
                <label class="control-label">Correct</label>
                <div class="controls" style="width:245px;">
            
                    {!! Form::hidden('correct', 0) !!}
                    {!! Form::checkbox('correct', 1, 0, ['class' => 'form-control']) !!}
                 
                </div>
              </div>
              
              <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>



@endsection


    

