@extends('layouts.frontLayout.front_design')
@section('content')

<div id="content mt-5">
  <div id="content-header " class="mt-5">
    <h1>Quiz</h1 >
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <!-- <div class="span12"> -->
        <div class="widget-box">
          <!-- <div class="widget-title"> <span class="icon icon-plus"> <i class="icon-info-list"></i> </span> -->
            <!-- <h5>Quiz</h5>
          </div> -->
          <div class="widget-content nopadding ">
            <form class="form-horizontal" method="post" action="{{route('tests.store')}}"  enctype="multipart/form-data" >
              @csrf
              @if(count($questions) > 0)
              <div class="control-group mt-2">
              <?php $i = 1; ?>
                @foreach($questions as $question)
                    @if ($i > 1) <hr /> @endif
                <div class="controls">
                <strong>Question {{ $i }}.<br />{!! nl2br($question->question_text) !!}</strong>

                    @if ($question->code_snippet != '')
                        <div class="code_snippet">{!! $question->code_snippet !!}</div>
                    @endif

                    <input
                        type="hidden"
                        name="questions[{{ $i }}]"
                        value="{{ $question->id }}">
                    @foreach($question->options as $option)
                    <br>
                    <label class="radio-inline">
                        <input
                            type="radio"
                            name="answers[{{ $question->id }}]"
                            value="{{ $option->id }}">
                        {{ $option->option }}
                    </label>
                    
                        @endforeach
        
               
               <?php $i++; ?>
               </div>
         </div>
         
        @endforeach
        </div>  
    @endif
    <div class="form-actions">
                <input type="submit" value="Save" class="btn btn-success">
              </div>
              <hr>
            </form>
             
    @endsection 
 
               @section('javascript')
        
        <script src="{{ url('frontend_js/js') }}/timepicker.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.4.5/jquery-ui-timepicker-addon.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
        <script>
            $('.datetime').datetimepicker({
                autoclose: true,
                dateFormat: "{{ config('app.date_format_js') }}",
                timeFormat: "hh:mm:ss"
            });
        </script>

        
       
                
                

            
         


