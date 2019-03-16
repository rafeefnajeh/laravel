<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    
    protected $fillable = ['user_id', 'test_id', 'question_id', 'option_id', 'correct'];
  
    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
