<?php

namespace App\Http\Controllers;

use App\Course;
use App\Session;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::join('contacts', 'trainer.contact_id', '=', 'contacts.id')
        ->join('users', 'contacts.user_id', '=', 'users.id')
        ->select('contacts.*', 'users.*', 'trainer.*')
        ->get();
        return view('admin.trainer.index', compact('trainers') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.trainer.create',compact('courses'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $trainer=Trainer::createTrainer($request->all());;
        $course = $trainer->courses()->attach($request->input('courses'));
        return redirect("/admin/trainer")->with('success','Success has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function show(Trainer $trainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        
        $id = $trainer->id;
       
        $trainers = Trainer::join('contacts', 'trainer.contact_id', '=', 'contacts.id')
        ->join('users', 'contacts.user_id', '=', 'users.id')
        ->select('contacts.*', 'users.*', 'trainer.*')
        ->where(['trainer.id' => $id])
        ->first();
        $courses = Course::all();
        $selectedCourses = [];
         foreach ($trainers->courses as $course) {
             $selectedCourses[] = $course->id;
         }
        
         return view('admin.trainer.edit', ['trainer' => $trainers, 
         'courses'=> $courses,
         'selectedCourse' => $selectedCourses
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
       Trainer::updateTrainer($request->all());
       if (isset($request->courses)) {
        $trainer->courses()->sync($request->courses);
    } else {
        $trainer->courses()->sync(array());
    }
    
      return redirect("/admin/trainer")->with('success','Has been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trainer  $trainer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $trainer->delete();
        return redirect('/admin/trainer')->with('success','has been Deleted');
    }
}
