<?php

namespace App\Http\Controllers;

use App\Student;
use App\Organization;
use App\Session;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $students = Student::join('contacts', 'student.contact_id', '=', 'contacts.id')
        ->join('users', 'contacts.user_id', '=', 'users.id')
        ->select('contacts.*', 'users.*', 'student.*')
        ->get();
        return view('admin.student.index')->with('students',$students);
  
    }

    public function courses_student()
    {
         
        /*$students = Student::join('courses', 'student.contact_id', '=', 'contacts.id')
        ->join('users', 'contacts.user_id', '=', 'users.id')
        ->select('contacts.*', 'users.*', 'student.*')
        ->get();*/

       $courses_students0 = DB::table('course_student')
       ->join('session', 'course_student.session_id', '=', 'session.id')
       ->join('student', 'course_student.student_id', '=', 'student.id')
       ->join('level', 'session.courses_level', '=', 'level.id')
        ->join('locations', 'session.location_id', '=', 'locations.id')
        ->join('trainer', 'session.trainer_id', '=', 'trainer.id')
        ->join('contacts', 'student.contact_id', '=', 'contacts.id')
        ->join('courses', 'session.courses_id', '=', 'courses.id')
        ->select('course_student.id as c_s_id','session.start_date','session.time','session.trainer_id','level.*','locations.name_location',
                 'trainer.contact_id as trainer_id','contacts.full_name','courses.*','student.*')
        ->get();
        
        $courses_students = array();

        foreach($courses_students0 as $course_student){
         
         if($course_student->trainer_id > 0){
         $course_student->trainer_name = DB::table('contacts')->where('id', $course_student->trainer_id)->value('full_name');   
         }  
          
         $courses_students[] = $course_student;

        }


        return view('admin.student.courses_student',compact('courses_students'));

       
  
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $courses = Course::all();
        $organizations =Organization::all();
        return view('admin.student.create',compact('organizations'));
    }
     
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Organization $organization)
    {
       
        if(isset($request->session)){
           /* $student = new Student([
                'student_id' => $request->student_id,
                'session_id' => $request->session,
                  ]);
                  
                $student->save();*/

                DB::table('course_student')->insert([
                    'student_id' => $request->student_id,
                     'session_id' => $request->session,
                    ]
                );
                return redirect('/admin/student/courses_student')->with('success','Has been added');

        }else{
            $student = Student::createStudent($request->all()); 
            return redirect('/admin/student')->with('success','Has been added');
        }

       

    }



    public function ajaxRequestGetSessions(Request $request)
    {

    $input = $request->all();

   /* $l = DB::table('course_level')
    ->select('level_id')
    ->where('course_id', '=', $request->course_id)
    ->pluck('level_id')->toArray();*/

    $sessions = DB::table('session')
                     ->select('id','start_date','time')
                     ->where('courses_id', $request->course_id)
                     ->where('courses_level', $request->level_id)
                     ->get();

    return response()->json(['success'=>'Success','sessions' => $sessions]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $s_id = $student->id;
        $student =Student::find($student);
        
        $courses =Course::all();
        return view('admin.student.add',compact('student','courses','s_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {           
        $id = $student->id;
    
        $students = Student::join('contacts', 'student.contact_id', '=', 'contacts.id')
        ->join('users', 'contacts.user_id', '=', 'users.id')
        ->select('contacts.*', 'users.*', 'student.*')
        ->where(['student.id' => $id])
        ->first();

        $organizations = Organization::all();
        $selectedOrganization =[];

        return view('admin.student.edit', [ 
            'student' => $students,
             'organizations'=> $organizations
           
            ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->organization_id = $request->input('organization'); 
        Student::updateStudent($request->all());   
        
        // if (isset($request->organization)) {
        //     $student->organization()->sync($request->organization);
        // } else {
        //     $student->organization()->sync(array());
        // }
        return redirect("/admin/student")->with('success','Has been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
       //return print_r($_POST);
        $student->delete();
        return redirect('/admin/student')->with('success','has been Deleted');

        
    }

    public function destroy0($id)
    {
        DB::table('course_student')->where('id', '=', $id)->delete();
       // return $id;
        return redirect('/admin/student/courses_student')->with('success','has been Deleted');
    }

}
