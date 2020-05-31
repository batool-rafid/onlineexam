<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected  $guarded = ['created_at','id'];
    public function exam(){
        return $this->belongsTo('App\Exam');
    }
   public function answers(){
       return $this->hasMany('App\Answer');
   }
}
