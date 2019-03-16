<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Organization;
use App\Trainer;
use App\Course;
use App\Session;
use Illuminate\Support\Facades\DB;
class PagesController extends Controller
{
    public function org(){

        return view('/pages/org');
    }

    public function index(){
        // $org_id=auth()->organization('id');
        // $org=Organization::find($org_id);
        // return view('index')->with('student',$org->student);
        return view('pages.index');
    }

    public function student(){
        $user_id = auth()->user()->id;
        /*$studentData = Student::join('contacts', "contacts.id", "=", "student.contact_id")
        ->join('users', "contacts.user_id", "=", "users.id")
        ->select('contacts.*', 'student.*')
        ->where('users.id', $user_id)
        ->first();*/

        $studentData = DB::table('course_student')
       ->join('session', 'course_student.session_id', '=', 'session.id')
       ->join('student', 'course_student.student_id', '=', 'student.id')
       ->join('level', 'session.courses_level', '=', 'level.id')
        ->join('locations', 'session.location_id', '=', 'locations.id')
        ->join('trainer', 'session.trainer_id', '=', 'trainer.id')
        ->join('contacts', 'student.contact_id', '=', 'contacts.id')
        ->join('courses', 'session.courses_id', '=', 'courses.id')
        ->join('users', 'contacts.user_id', '=', 'users.id')
        ->select('course_student.id as c_s_id','session.start_date','session.time','session.trainer_id','level.*','locations.name_location',
                 'trainer.contact_id as trainer_id','contacts.full_name','courses.*','student.*')
        ->where('users.id', $user_id)
        ->get();
       //print_r($studentData);
        return view('pages.student', ['student' => $studentData]);
    }

    public function organization(){
        $user_id = auth()->user()->id;
        /*$organizationData = Organization::join('contacts', "contacts.id", "=", "organization.contact_id")
        ->join('student', 'organization.id', '=', 'student.organization_id')
        ->join('course_student', 'student.id', '=', 'course_student.student_id')
        ->join('session', 'course_student.session_id', '=', 'session.id')
        ->join('level', 'session.courses_level', '=', 'level.id')
        ->join('courses', 'session.courses_id', '=', 'courses.id')

        ->join('users', "contacts.user_id", "=", "users.id")
        ->select('contacts.*', 'organization.*')
        ->where('users.id', $user_id)
        ->first();*/

        $o_id = DB::table('organization')
        ->join('contacts', "contacts.id", "=", "organization.contact_id")
        ->join('users', 'contacts.user_id', '=', 'users.id')
        ->select('organization.id as o_id')
        ->where('users.id', $user_id)
        ->first();
//print_r($o_id->o_id);
//exit;
        $organizationData = DB::table('organization')
        ->join('student', 'organization.id', '=', 'student.organization_id')
        ->join('contacts', 'contacts.id', '=', 'student.contact_id')
         
         ->join('course_student', 'student.id', '=', 'course_student.student_id')
         ->join('session', 'course_student.session_id', '=', 'session.id')
         ->join('level', 'session.courses_level', '=', 'level.id')
         ->join('courses', 'session.courses_id', '=', 'courses.id')
         
         ->join('users', 'contacts.user_id', '=', 'users.id')
         ->select('*')
         ->where('student.organization_id', $o_id->o_id)
         ->get();

         //print_r($organizationData);
         //exit;
     
        return view('pages.organization', ['organization' => $organizationData]);
    }
    
    public function trainer(){
        $user_id = auth()->user()->id;
        // $trainerData =Trainer::join('contacts', "contacts.id", "=", "trainer.contact_id")
        // ->join('users', "contacts.user_id", "=", "users.id")
        // ->select('contacts.*', 'trainer.*')
        // ->where('users.id', $user_id)
        // ->first();

        
        $trainerData = DB::table('course_trainer')
        ->join('session', 'course_trainer.course_id', '=', 'session.courses_id')
        ->join('level', 'session.courses_level', '=', 'level.id')
         ->join('locations', 'session.location_id', '=', 'locations.id')
         ->join('trainer', 'session.trainer_id', '=', 'trainer.id')
         ->join('contacts', 'trainer.contact_id', '=', 'contacts.id')
         ->join('courses', 'session.courses_id', '=', 'courses.id')
         ->join('users', 'contacts.user_id', '=', 'users.id')
         ->select('session.start_date','session.time','session.trainer_id','level.*','locations.name_location',
                  'trainer.contact_id as trainer_id','contacts.full_name','courses.*')
         ->where('users.id', $user_id)
         ->distinct()
         ->get();

        // print_r($trainerData);
        // exit;
       
        return view('pages.trainer', ['trainer_courses' => $trainerData]);
    }

    public function courses(){
        return view('post_courses.index');
    }
}
