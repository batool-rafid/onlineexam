<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = ['id','created_at'];
    public function student_exam(){
        return $this->belongsTo('App\StudentExam');
    }
    public function question(){
        return $this->belongsTo('App\Question');
    }
}
