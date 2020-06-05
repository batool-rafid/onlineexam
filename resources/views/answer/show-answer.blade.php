@extends('layouts.student')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Answers of student {{$answers[0]->student_exam->user->name}} - Exam {{$answers[0]->student_exam->exam->name}}</div>

                <div class="card-body">
                <form method="POST" action="#">

                        @csrf
                        @include('errors.errmsg')
                        @if(session('msg'))
                            <div class="alert alert-success">
                                {{session('msg')}}
                            </div>
                        @endif
                        <?php $i=1; ?>
                        @foreach($answers as $answer)

                        <div class="form-group row">
                            <label for="{{$answer->question->question}}" class="col-md-2 col-form-label text-md-right"><b>Question {{$i}}</b></label>

                            <div class="col-md-8">
                                {{$answer->question->question}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$answer->question->choice_1}}" class="col-md-2 col-form-label text-md-right"><b>Choice 1</b></label>

                            <div class="col-md-8">
                                {{$answer->question->choice_1}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$answer->question->choice_2}}" class="col-md-2 col-form-label text-md-right"><b>Choice 2</b></label>

                            <div class="col-md-8">
                                {{$answer->question->choice_2}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$answer->question->choice_3}}" class="col-md-2 col-form-label text-md-right"><b>Choice 3</b></label>

                            <div class="col-md-8">
                                {{$answer->question->choice_3}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$answer->question->choice_4}}" class="col-md-2 col-form-label text-md-right"><b>Choice 4</b></label>

                            <div class="col-md-8">
                                {{$answer->question->choice_4}}
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="{{$answer->question->correct}}" class="col-md-2 col-form-label text-md-right"><b>Correct Choice</b></label>

                            <div class="col-md-8 ">
                                {{$answer->question->correct}}
                            </div>
                        </div>
                        <div class="form-group row">
                            @if($answer->question->correct == $answer->slected_choice)
                            <label for="{{$answer->slected_choice}}" class="col-md-2 col-form-label text-md-right"><b>Selected Choice</b></label>
                            <div class="col-md-8 border-bottom border-success">
                                {{$answer->slected_choice}}
                            </div>
                            @else
                            <label for="{{$answer->slected_choice}}" class="col-md-2 col-form-label text-md-right"><b>Selected Choice</b></label>
                            <div class="col-md-8 border-bottom border-danger">
                                {{$answer->slected_choice}}
                            </div>
                            @endif

                        </div>
                        <div class= "form-group row justify-content-center">
                            <div class="col-md-11">
                                <hr>
                            </div>
                        </div>
                        

                   

                        <?php $i++; ?>
                        @endforeach

                 
        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection