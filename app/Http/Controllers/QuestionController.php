<?php

namespace App\Http\Controllers;

use App\Question;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
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
                'qch_'.$i.'_1' => ['string', 'required', 'max:190' ],
                'qch_'.$i.'_2' => ['string', 'required', 'max:190' ],
                'qch_'.$i.'_3' => ['string', 'required', 'max:190' ],
                'qch_'.$i.'_4' => ['string', 'required', 'max:190' ],

            ]);
    
        }
        for( $i = 1 ; $i <= $exam_len ; $i++){
            $question = Question::create([
                'exam_id' =>$exam_id,
                'question' => $data['q_'.$i],
                'choice_1' => $data['qch_'.$i.'_1'],
                'choice_2' => $data['qch_'.$i.'_2'],
                'choice_3' => $data['qch_'.$i.'_3'],
                'choice_4' => $data['qch_'.$i.'_4'],
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
