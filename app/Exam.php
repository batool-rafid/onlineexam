<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'name', 'discription', 'material','stage','user_id','questionsnum'
    ];
    
    public function lecturer(){
        return $this->belongsTo('App\User');
    }
   public function questions(){
       return $this->hasMany('App\Question');
   }
   public function students(){
       return $this->belongsToMany('App\User', 'student_exams')->withPivot('score');
   }
}
