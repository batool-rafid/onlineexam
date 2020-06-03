<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function showexams(){
        if(Auth::user()->role->name == 'Student'){
        $exams = Exam::where('stage', Auth::user()->student->stage)->orderBy('created_at','desc')->paginate(5);
        return view('exam.show-exams')->with('exams',$exams);}
        
        elseif (Auth::user()->role->name == 'Lecturer'){
            
        $exams = Exam::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->paginate(5);
        return view('exam.show-exams')->with('exams',$exams);

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portals.lecturer.create-exam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validate($request,[
            'name' => ['string' , 'max:191' , 'required'],
            'discription' => ['string' ],
            'material' => ['string' , 'max:191' , 'required'],
            'questionsnum' => ['integer' , 'required'],
        ]);

        $exam = Exam::create([
            'user_id' =>Auth::user()->id,
            'name' => $data['name'],
            'discription' => $data['discription'],
            'stage' => $data['stage'],
            'material' => $data['material'],
            'questionsnum' => $data['questionsnum'],

        ]);
            
        return view('portals.lecturer.add-questions')->with(
            [
            'msg' => 'Exam Created Successfully',
            'exam' => $exam  
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //TODO
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        $exam = Exam::find($exam->id);
        return view('exam.edit-exam')->with('exam',$exam);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
    
          Exam::find($exam->id)->update($request->all());
          $exam = Exam::find($exam->id);
         return view('exam.edit-exam')->with('exam',$exam);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $questions = Exam::find($exam->id)->questions;
        foreach($questions as $question){
            if(is_null($question->answers)){
                $question->destroy($question->id);
            }
        }
        $exam = Exam::find($exam->id);
        $exam->destroy($exam->id);
        return redirect(route('exam.showexams'))->with('msg','Deleted');
    }
}
