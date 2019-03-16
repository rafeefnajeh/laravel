<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{

    protected $table = 'session';
    protected $fillable =[
        'start_date' , 'time','student_no','trainer_id','location_id','courses_id','courses_level'
    ];

    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
       
    }
    public function location()
    {
        return $this->belongsTo('App\Location');
       
    }
    public function Course()
    {
        return $this->belongsTo('App\Course');
       
    }
    public function  student()
    {
        return $this->belongsToMany('App\Student');
       
    }
    public function contact()
    {
        return $this->belongsTo('App\Contact');
       
    }
}
