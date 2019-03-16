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
            <h5> Add Courses</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" class="form-horizontal" method="post" action="{{route('student.store')}}">
              @csrf
              
                     <input id="student_id" type="hidden" name="student_id" value="{{$s_id}}" />
               <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Courses</label>
                  <div class="controls">
                    <!-- <input id="courses_id" type="text" name="courses_id" /> -->
                    <select onchange="getLevels(this.value);" id="courses_id" name="courses_id" style="width:220px;">
                    <option>---Please Select Course---</option>
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->courses_name}}</option>
                        @endforeach
                    </select>
                      
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Level</label>
                  <div class="controls">
                  <select onchange="getSessions(this.value);" id="courses_level"  name="courses_level" style="width:220px;">
                  <option>---Please Select Level---</option>
                    </select>
                  </div>
                </div>
              </div>

              <div id="form-wizard-2" class="step">
              <div class="control-group">
                  <label class="control-label">Session</label>
                  <div class="controls">
                  <select id="session"  name="session" style="width:220px;">
                  <option>---Please Select Session---</option>
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
 
 $.ajax({

    type:'GET',
    dataType:'json',

    url:'/ajaxRequestGetLevels',

    data:{course_id:course_id},

    success:function(data){
     
     $('#courses_level').find('option').remove()

var o = new Option('---Please Select Level---', '');
/// jquerify the DOM object 'o' so we can use the html method
$(o).html('---Please Select Level---');
$("#courses_level").append(o);


   $.each( data.levels, function( index , value ) {
  
var o = new Option(value.level_name, value.id);
/// jquerify the DOM object 'o' so we can use the html method
$(o).html(value.level_name);
$("#courses_level").append(o);

//alert( value.id + ' ' + value.level_name );
});


    }

 });

}


function getSessions(level_id){
 
var course_id = $('#courses_id').val();
//alert(level_id);
//alert(course_id);
 $.ajax({

    type:'GET',
    dataType:'json',

    url:'/ajaxRequestGetSessions',

    data:{course_id:course_id,level_id:level_id},

    success:function(data){
     
     $('#session').find('option').remove()

   $.each( data.sessions, function( index , value ) {
  
var o = new Option(value.start_date + ' - ' + value.time, value.id);
/// jquerify the DOM object 'o' so we can use the html method
$(o).html(value.start_date + ' | ' + value.time);
$("#session").append(o);

//alert( value.id + ' ' + value.level_name );
});


    }

 });

}

</script>
@endsection