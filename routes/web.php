<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//TODO make a midlleware to the routes acording to roles
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {
    
    Route::resource('/exam','ExamController');
    Route::resource('/student','StudentController');
    Route::resource('/lecturer','LecturerController');
    Route::resource('/admin','AdminController');
    Route::resource('/question','QuestionController');
    Route::resource('/student-exam','StudentExamController');
    //Route::get('questions/create/{dd}','QuestionController@create')->name('questions.create');

    Route::get('/st/myexams','ExamController@studentexams')->name('exam.studentexams');
});


/*

    Route::get('/student/home',function(){
        return view('portals.student.st-home');
    })->name('student.home');

    Route::get('/lecturer/home',function(){
        return view('portals.lecturer.lc-home');
    })->name('lecturer.home');

    Route::get('/admin/home',function(){
        return view('portals.admin.ad-home');
    })->name('admin.home');
*/