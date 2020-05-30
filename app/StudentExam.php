<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentExam extends Model
{
    public function answers(){
        return $this->hasMany('App\Answer');
    }
}
