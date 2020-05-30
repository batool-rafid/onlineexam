<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function student_exam(){
        return $this->belongsTo('App\StudentExam');
    }
}
