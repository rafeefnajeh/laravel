<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Course extends Model
{
    protected $fillable =[
        'courses_name' , 'courses_description','courses_outline','cost','level','hours'
    ];

    

    // public function organization(){

    //     return $this->belongsTo('App\Organization');
    //    }

    // public function location(){

    //     return $this->belongsTo('App\Location');
    //    }
      
  
    public static function updateCourses($data) {
       
        DB::table('courses')
        ->where('id',$data['courses_id'])
        ->update([
            'courses_name'=>$data['courses_name'],
            'courses_description'=>$data['courses_description'],
            'courses_outline'=>$data['courses_outline'],
            'hours'=>$data['hours'],
            'cost'=>$data['cost'],
        ]);
    
    
}


    public function student()
        {
            return $this->belongsToMany('App\Student');
        }


        public function trainer()
        {
            return $this->belongsToMany('App\Trainer');
        }
 
        public function coursesSession(){
            return $this->hasMany('App\CoursesSession');
        }

        public function level()
        {
            return $this->belongsToMany('App\Level');
        }
 
        public function questions()
        {
            return $this->hasMany(Question::class, 'courses_id')->withTrashed();
        }
}
