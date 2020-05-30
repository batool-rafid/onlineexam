<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }
    public function student(){
        return $this->hasOne('App\Student');
    }
    // exams creaated by lecturer
    public function exams_created_by_lecturer(){
        return $this->hasMany('App\Exam');
    }
    //exams taken by students
    public function exams_taken_by_student(){
        return $this->belongsToMany('App\Exam', 'student_exams')->withPivot('score');
    }
    
   
}
