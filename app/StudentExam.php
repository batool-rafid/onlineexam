<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentExam extends Model
{
    protected  $guarded = ['created_at','id'];
    public function answers(){
        return $this->hasMany('App\Answer');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function exam(){
        return $this->belongsTo('App\Exam');
    }
}
