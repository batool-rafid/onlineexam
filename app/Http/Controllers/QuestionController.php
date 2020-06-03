<?php

namespace App\Http\Controllers;

use App\Question;
use App\Exam;

use Illuminate\Http\Request;

class QuestionController extends Controller
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
    public function showquestions( $id){
        $exam = Exam::find($id);
        $questions = $exam->questions;
        return view('question.show-questions')->with(['exam'=>$exam,'questions'=>$questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Exam $exam)
    {

        return view('question.add-question')->with('exam',$exam);
    }

    public function create_question($id)
    {
        $exam = Exam::find($id);
        return view('question.add-question')->with('exam',$exam);
    }

    
    public function store_question(Request $request)
    {

        $data = $request->all();
   
    
            $question = Question::create([
                'exam_id' =>$data['exam_id'],
                'question' => $data['question'],
                'choice_1' => $data['choice_1'],
                'choice_2' => $data['choice_2'],
                'choice_3' => $data['choice_3'],
                'choice_4' => $data['choice_4'],
                'correct' => $data['correct'],
    
            ]);
            // update exam questios number
            $exam = Exam::where('id',$data['exam_id'])->update([
                 'questionsnum' =>$data['questionsnum'] + 1
             ]);
        
    
            
        return redirect(route('question.showquestions',$data['exam_id']));
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
        $exam_len = $data['exam_len'] ; 
        $exam_id = $data['exam_id'] ;
        for( $i = 1 ; $i <= $exam_len ; $i++){
            $this->validate($request,[
            
                'q_'.$i => [ 'required'],
                'choice_1'.$i.'_1' => ['string', 'required', 'max:190' ],
                'choice_1'.$i.'_2' => ['string', 'required', 'max:190' ],
                'choice_1'.$i.'_3' => ['string', 'required', 'max:190' ],
                'choice_1'.$i.'_4' => ['string', 'required', 'max:190' ],

            ]);
    
        }
        for( $i = 1 ; $i <= $exam_len ; $i++){
            $question = Question::create([
                'exam_id' =>$exam_id,
                'question' => $data['q_'.$i],
                'choice_1' => $data['choice_1'.$i.'_1'],
                'choice_2' => $data['choice_1'.$i.'_2'],
                'choice_3' => $data['choice_1'.$i.'_3'],
                'choice_4' => $data['choice_1'.$i.'_4'],
                'correct' => $data['correct_'.$i],
    
            ]);
        }
    
            
        return redirect(route('lecturer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //TODO
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $question = Question::find($id);
        return view('question.edit-question')->with('question',$question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        Question::find($question->id)->update($request->all());
        $question = Question::find($question->id);
        return view('question.edit-question')->with('question',$question);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->destroy($question->id);
        return redirect(route('question.showquestions',$question->exam_id))->with('msg','Deleted');
    }
}
