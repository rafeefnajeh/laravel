<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $table = 'locations';
    protected $fillable =[
        'name_location'
    ];


    public function courses(){
        return $this->hasMany('App\Course');
    }

    public function location(){
        return $this->hasMany('App\Location');
    }

    public function coursesSession(){
        return $this->hasMany('App\CoursesSession');
    }
}


