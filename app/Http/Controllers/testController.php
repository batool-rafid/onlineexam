<?php

namespace App\Http\Controllers;
use App\Question;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function addquestions(Request $request)
    {
        $data = $request->all();
        $exam_len = $data['exam_len'] ; 
        $exam_id = $data['exam_id'] ;
     
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
    
            
        return redirect(route('exam.showexams'));
    }
}
