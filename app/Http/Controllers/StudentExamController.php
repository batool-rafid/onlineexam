<?php

namespace App\Http\Controllers;

use App\StudentExam;
use App\Exam;
use App\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function show_results(Exam $exam){
        $results = StudentExam::where('exam_id',$exam->id)->get();
        return view('studentexam.show-results')->with('results',$results);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exam $exam)
    {
        $questions = $exam->questions ; 
        return view('studentexam.create')->with(['exam'=>$exam,'questions'=>$questions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Exam $exam)
    {
        $data= $request->all();
        $stexam = StudentExam::create([
            'user_id'=>Auth::user()->id,
            'exam_id'=>$exam->id ,
            'score'=> 0 
        ]);
        $questions = $exam->questions;
        $score = 0 ;
        foreach($questions as $question){
            if($data['correct_'.$question->id] == $question->correct)
                $score++;
            Answer::create([
                'student_exam_id'=>$stexam->id,
                'question_id' => $question->id,
                'slected_choice'=>$data['correct_'.$question->id]
            ]);
        }
        StudentExam::find($stexam->id)->update([
            'score'=>$score 
        ]);
        $ex = Exam::where('id',$exam->id)->update([
            //'user_id' => Auth::user()->id,
             'status' => 'Finished'
         ]);
        return redirect(route('exam.showexams'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentExam  $studentExam
     * @return \Illuminate\Http\Response
     */
    public function show(StudentExam $studentExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentExam  $studentExam
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentExam $studentExam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentExam  $studentExam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentExam $studentExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentExam  $studentExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentExam $studentExam)
    {
        //
    }
}
