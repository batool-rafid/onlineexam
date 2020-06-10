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
    return view('layouts.welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['verify' => false]);
Route::middleware(['auth'])->group(function () {
    
    Route::resource('/exam','ExamController');
    Route::resource('/student','StudentController');
    Route::resource('/lecturer','LecturerController');
    Route::resource('/admin','AdminController');

    Route::get('/question/create/{id}','QuestionController@create_question')->name('question.create_question');
    Route::post('/questio/store','QuestionController@store_question')->name('question.store_question');
    Route::resource('/question','QuestionController');
    Route::resource('exam.student-exam','StudentExamController')->shallow();
    
    //Shared
    Route::get('/st/myexams','ExamController@showexams')->name('exam.showexams');
    Route::get('/lc/examquestions/{exam}','QuestionController@showquestions')->name('question.showquestions');




    //Student Routes
   




   //Lecturer route
   //Route::get('/st/exam/answers/{stexam}','AnswerController@show_answers')->name('answer.show-answers');
    Route::get('/st/exam/answers/{stexam}', [
        'uses' =>'AnswerController@show_answers',
        'as'=>'answer.show-answers',
        'middleware'=>'roles',
        'roles' => ['Lecturer'],
    ]);
    //Route::get('/exam/results/{exam}','StudentExamController@show_results')->name('studentexam.show-results');
    Route::get('/exam/results/{exam}', [
        'uses' =>'StudentExamController@show_results',
        'as'=>'studentexam.show-results',
        'middleware'=>'roles',
        'roles' => ['Lecturer'],
    ]);
    
   
});


/*
Route::get('/st/exam/answers/{stexam}', [
        'uses' =>'AnswerController@show_answers',
        'as'=>'answer.show-answers',
        'middleware'=>'roles',
        'roles' => ['Lecturer'],
    ]);
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