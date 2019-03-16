<?php

namespace App\Http\Controllers;

use App\Session;
use App\Course;
use App\Trainer;
use App\Location;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sessions = DB::table('session')
        ->join('level', 'session.courses_level', '=', 'level.id')
         ->join('locations', 'session.location_id', '=', 'locations.id')
         ->join('trainer', 'session.trainer_id', '=', 'trainer.id')
         ->join('contacts', 'trainer.contact_id', '=', 'contacts.id')
         ->join('courses', 'session.courses_id', '=', 'courses.id')
         ->select('session.id as session_id','session.*','level.*','locations.name_location',
                  'trainer.contact_id as trainer_id','contacts.full_name as trainer_name','courses.*')
         ->get();
        // return $sessions; 

        //$sessions =Session::all();
        return  view('admin.courses_session.index',compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses =Course::all();
        $trainers =Trainer::all();
        $locations =Location::all();
        
    return view('admin.courses_session.create',compact('courses','trainers','locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $inputDate=date("Y-m-d",strtotime($request->date));
        $session = new Session([
        'start_date'=>$inputDate,
        'time' => $request->time,
        'student_no' => $request->student_no,
        'courses_id' => $request->courses_id,
        'courses_level' => $request->courses_level,
        'trainer_id' => $request->trainer_id,  
        'location_id' => $request->location_id,
          ]);
          
        $session->save();
          return redirect('/admin/courses_session')->with('success','Has been added');
    }

    public function ajaxRequestGetLevels(Request $request)
    {

    $input = $request->all();

    $l = DB::table('course_level')
    ->select('level_id')
    ->where('course_id', '=', $request->course_id)
    ->pluck('level_id')->toArray();

    $levels = DB::table('level')
                     ->select('id','level_name')
                     ->whereIn('id', $l)
                     ->get();

    return response()->json(['success'=>'Success','levels' => $levels]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit($session_id)
    {
        
       // $id = $session->id;

        $session = DB::table('session')
        ->join('level', 'session.courses_level', '=', 'level.id')
         ->join('locations', 'session.location_id', '=', 'locations.id')
         ->join('trainer', 'session.trainer_id', '=', 'trainer.id')
         ->join('contacts', 'trainer.contact_id', '=', 'contacts.id')
         ->join('courses', 'session.courses_id', '=', 'courses.id')
         ->select('session.id as session_id','session.*','level.*','locations.name_location',
                  'contacts.full_name as trainer_name','courses.*')
                  ->where(['session.id' => $session_id])->first();
        // return $session; 

        $course_levels = DB::table('course_level')
        ->join('level', 'course_level.level_id', '=', 'level.id')
        ->select('course_level.id as c_l_id','course_level.*','level.*')
        ->where(['course_level.course_id' => $session->courses_id])->get();

        $courses = Course::all();

       /* $trainers = Trainer::join('contacts', 'trainer.contact_id', '=', 'contacts.id')
        ->join('users', 'contacts.user_id', '=', 'users.id')
        ->select('contacts.*', 'users.*', 'trainer.*')
        ->get();*/

        $trainers =Trainer::all();
        $locations =Location::all();

        //$sessions =Session::all();
        return  view('admin.courses_session.edit',compact('session','courses','trainers','locations','course_levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$session_id)
    {
        
//return $session;
        $inputDate=date("Y-m-d",strtotime($request->date));

          DB::table('session')
            ->where('id', $session_id)
            ->update([
                'start_date'=>$inputDate,
                'time' => $request->time,
                'student_no' => $request->student_no,
                'courses_id' => $request->courses_id,
                'courses_level' => $request->courses_level,
                'trainer_id' => $request->trainer_id,  
                'location_id' => $request->location_id,
                ]);

                return redirect("/admin/courses_session")->with('success','Has been Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy($session_id)
    {
        DB::table('session')->where('id', '=', $session_id)->delete();
        // return $id;
         return redirect('/admin/courses_session')->with('success','has been Deleted');
    }
}
