<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Question extends Model
{

    use SoftDeletes;
    protected $fillable = ['question_text', 'code_snippet', 'answer_explanation', 'more_info_link', 'courses_id'];
    public static function boot()
    {
        parent::boot();
        // Question::observe(new \App\Observers\UserActionsObserver);
    }
    /**
     * Set to null if empty
     * @param $input
     */
    public function setTopicIdAttribute($input)
    {
        $this->attributes['courses_id'] = $input ? $input : null;
    }

    

    public function courses()
    {
        return $this->belongsTo('App\Course');
    }
    public function options()
    {
        return $this->hasMany(QuestionsOption::class, 'question_id')->withTrashed();
    }
}
