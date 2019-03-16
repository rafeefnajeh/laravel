in create student 
  <div class="control-group">
                <label class="control-label">Select Courses</label>
                <div class="controls">
                <select name='courses[]' style="width:220px;" multiple="multiple">
                            @foreach( $courses as $course )
                            <option value="{{$course->id}}">{{$course->name_courses}}</option>
                          @endforeach
                          </select>
                </div>
              </div>


              in student controller
              create
              public function create()
    {
         $courses = Course::all();
       
        return view('admin.student.create',compact('courses'));
    }