<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
  

    protected $table = 'level';
    protected $fillable =[
        'level_name'
    ];

    public function courses()
    {
        return $this->belongsToMany('App\Course');
       
    }
}
