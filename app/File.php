<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $fillable=[
        'title','body','path_file','post_id'
    ];


    public function post()
    {
        return $this->belongsTo('App\Post');
       
    }
}
