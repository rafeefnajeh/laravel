<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCourses;
use App\Course;
use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $levels = Level::all();
        $courses = Course::all();
        return view('admin.courses.index',compact('levels','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        return view('admin.courses.create',compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourses $request)
    {
    
          $request->validated();
          //Handle file Upload
          if($request->hasFile('courses_outline')){
               //Get file name with extension
               $filenameWithExt = $request->file('courses_outline')->getClientOriginalName();
               //Get just filename
               $fileName =pathinfo( $filenameWithExt,PATHINFO_FILENAME );
               //Get just Extension
              $Extension= $request->file('courses_outline')->getClientOriginalExtension();
              // file name to store
              $fileNameToStore = $fileName.'_'.'.'. $Extension;
              //Upload file
              $path = $request->file('courses_outline')->storeAs('public/courses_outline',$fileNameToStore);
          }else{
              $fileNameToStore = 'no file';
          }
          /*$course = new Course;
          $course->courses_name = $request->courses_name;
          $course->courses_description = $request->courses_description;
          $course->courses_outline =  $fileNameToStore;
          $course->cost = $request->cost;
          $course->hours = $request->hours;*/
          
          //$c_l_id = DB::table('courses')->max('c_l_id');
          //$c_l_id = $c_l_id + 1;
          //$course->c_l_id = $c_l_id;

          DB::table('courses')->insert(
            [
                'courses_name' => $request->courses_name,
                'courses_description' => $request->courses_description,
                'courses_outline' => $fileNameToStore,
                'cost' => $request->cost,
                'hours' => $request->hours,
                //'c_l_id' => $c_l_id,
            ]
        );

       // $c_id = DB::table('courses')->max('id');
          $c_id = DB::getPdo()->lastInsertId();
          
        foreach($request->input('level') as $level_id){

            DB::table('course_level')->insert(
                [
                    'course_id' => $c_id,
                    'level_id' => $level_id,
                    //'c_l_id' => $c_l_id,
                ]
            );

        }

           //$level->level()->attach($request->input('level_name')); 
          //$course->save();
          return redirect('/admin/courses')->with('success','Has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        
             $levels = Level::all();
             $course_id = $course->id;
            $selectedLevel = [];
            foreach ($course->level as $level) {
                $selectedLevel[] = $level->id;
            }

            return view('admin.courses.edit', [ 
           
            'course' => $course,
            'levels'=> $levels,
            'selectedLevel'=>$selectedLevel
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
     

        
        //Handle file Upload
        if($request->hasFile('courses_outline')){
            //Get file name with extension
            $filenameWithExt = $request->file('courses_outline')->getClientOriginalName();
            //Get just filename
            $fileName =pathinfo( $filenameWithExt,PATHINFO_FILENAME );
            //Get just Extension
           $Extension= $request->file('courses_outline')->getClientOriginalExtension();
           // file name to store
           $fileNameToStore = $fileName.'_'.'.'. $Extension;
           //Upload file
           $path = $request->file('courses_outline')->storeAs('public/courses_outline',$fileNameToStore);

           //$course->level_id = $request->level_id; 
           $course->update(['courses_name' => $request->courses_name,
           'courses_description' => $request->courses_description,
           'hours' => $request->hours,
           'cost' => $request->cost,
           'courses_outline' =>  $fileNameToStore,
           
           ]);    


       }else{
        $course->update(['courses_name' => $request->courses_name,
        'courses_description' => $request->courses_description,
        'hours' => $request->hours,
        'cost' => $request->cost,
        
        ]);    
       }
       

       DB::table('course_level')->whereNotIn('level_id', $request->input('level'))
       ->where('course_id', '=', $request->courses_id)
       ->delete();

       $old_levels = DB::table('course_level')
       ->select('level_id')
       ->where('course_id', '=', $request->courses_id)
       ->pluck('level_id')->toArray();


       if(is_array($request->input('level'))){
            foreach($request->input('level') as $level_id){
            if(!in_array($level_id , $old_levels)){
                DB::table('course_level')->insert(
                    [
                        'course_id' => $request->courses_id,
                        'level_id' => $level_id,
                    ]
                );
                }
                }
    }
        

       
        return redirect()->route('courses.index')
                        ->with('success','Courses updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect('/admin/courses')->with('success','has been Deleted');
    }
}
