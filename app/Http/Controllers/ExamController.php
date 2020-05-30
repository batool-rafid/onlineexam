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

    public function studentexams(){
        $exams = Exam::where('stage', Auth::user()->student->stage)->orderBy('created_at','desc')->paginate(5);
        return view('portals.student.st-exams')->with('exams',$exams);
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
        ]);
        $exam = Exam::create([
            'user_id' =>Auth::user()->id,
            'name' => $data['name'],
            'discription' => $data['discription'],
            'stage' => $data['stage'],
            'material' => $data['material']

        ]);

        return redirect(route('exam.create'))->with('msg','Exam Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
