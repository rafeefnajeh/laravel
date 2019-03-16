@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Form elements</a> <a href="#" class="current">Form wizard</a> </div>
    <h1>Courses Session</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Courses Session</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" class="form-horizontal" method="post" action="{{route('courses_session.update',$session->session_id)}}">
            @csrf
                 @method('PATCH')
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Start Date</label>
                  <div class="controls">
                    <input id="date" type="date" name="date" value="{{$session->start_date}}"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Time</label>
                  <div class="controls">
                    <input id="time" type="time" name="time"  value="{{$session->time}}" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Student Number</label>
                  <div class="controls">
                    <input id="student_no" type="number" name="student_no"  value="{{$session->student_no}}" />
                  </div>
                </div>
              </div>
              <div id="form-wizard-2" class="step">
                <div class="control-group">
                  <label class="control-label">Courses</label>
                  <div class="controls">
                    <!-- <input id="courses_id" type="text" name="courses_id" /> -->
                    <select onchange="getLevels(this.value);" name="courses_id" style="width:220px;">
                    <option>---Please Select Course---</option>
                        @foreach($courses as $course)

                        @if($session->courses_id == $course->id)
                        <option selected="selected" value="{{$course->id}}">{{$course->courses_name}}</option>
                        @else
                        <option value="{{$course->id}}">{{$course->courses_name}}</option>
                        @endif

                        @endforeach
                    </select>
                      
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Level</label>
                  <div class="controls">
                  <select id="courses_level"  name="courses_level" style="width:220px;">
                  <option>---Please Select Level---</option>
                    @foreach($course_levels as $course_level)

                    @if($session->courses_level == $course_level->id)
                    <option selected="selected" value="{{$course_level->id}}">{{$course_level->level_name}}</option>
                    @else
                    <option value="{{$course_level->id}}">{{$course_level->level_name}}</option>
                    @endif

                    @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div id="form-wizard-3" class="step">
                <div class="control-group">
                  <label class="control-label">Trainer</label>
                  <div class="controls">
                  <select name="trainer_id" style="width:220px;">
                        @foreach($trainers as $trainer)
                        @if($session->trainer_id == $trainer->id)
                        <option selected="selected" value="{{$trainer->id}}">{{$trainer->contact->full_name}}</option>
                        @else
                        <option value="{{$trainer->id}}">{{$trainer->contact->full_name}}</option>
                        @endif
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Location</label>
                  <div class="controls">
                  <select name="location_id" style="width:220px;">
                        @foreach($locations as $location)
                        @if($session->location_id == $location->id)
                        <option selected="selected" value="{{$location->id}}">{{$location->name_location}}</option>
                        @else
                        <option value="{{$location->id}}">{{$location->name_location}}</option>
                        @endif
                        @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-actions">
                <input id="back" class="btn btn-primary" type="reset" value="Back" />
                <input id="next" class="btn btn-primary" type="submit" value="Next" />
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

   

/*$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});*/



function getLevels(course_id){
//alert(course_id);
 
    $.ajax({

       type:'GET',
       dataType:'json',

       url:'/ajaxRequestGetLevels',

       data:{course_id:course_id},

       success:function(data){
        
        $('#courses_level').find('option').remove()

       // var x = 0;
      $.each( data.levels, function( index , value ) {
       // x = 1;

var o = new Option(value.level_name, value.id);
/// jquerify the DOM object 'o' so we can use the html method
$(o).html(value.level_name);
$("#courses_level").append(o);



  //alert( value.id + ' ' + value.level_name );
});

/*if(x == 1){
$('#courses_level').prop( "disabled", false );
}else{
  $('#courses_level').prop( "disabled", true );
}*/


        //  alert(data.success);

       }

    });



}

</script>
@endsection