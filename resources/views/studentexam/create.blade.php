@extends('layouts.student')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Answering Exam {{$exam->name}}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('exam.student-exam.store',$exam) }}">
                <input type="hidden" name="exam_id" value={{$exam->id}}>
                <input type="hidden" name="exam_len" value={{$exam->questionsnum}}>
                        @csrf
                        @include('errors.errmsg')
                        @if(session('msg'))
                            <div class="alert alert-success">
                                {{session('msg')}}
                            </div>
                        @endif
                        <?php $i=1; ?>
                        @foreach($questions as $question)
                        <div class="form-group row">
                            <label for="{{$question->question}}" class="col-md-2 col-form-label text-md-right"><b>Question {{$i}}</b></label>

                            <div class="col-md-8">
                                {{$question->question}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$question->choice_1}}" class="col-md-2 col-form-label text-md-right"><b>Choice 1</b></label>

                            <div class="col-md-8">
                                {{$question->choice_1}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$question->choice_2}}" class="col-md-2 col-form-label text-md-right"><b>Choice 2</b></label>

                            <div class="col-md-8">
                                {{$question->choice_2}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$question->choice_3}}" class="col-md-2 col-form-label text-md-right"><b>Choice 3</b></label>

                            <div class="col-md-8">
                                {{$question->choice_3}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$question->choice_4}}" class="col-md-2 col-form-label text-md-right"><b>Choice 4</b></label>

                            <div class="col-md-8">
                                {{$question->choice_4}}
                            </div>
                        </div>
                        <div class="form-group row"  id="correct_{{$question->id}}">
                            <label for="correct_{{$question->id}}" class="col-md-2 col-form-label text-md-right">{{ __('Correct Choice') }}</label>
                            <div class="col-md-8">
                            <select class="form-control" style="background-color: #b3ffcc;"  name="correct_{{$question->id}}" value="{{ old('correct') }}" >
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            </div>
                        </div>
                        <?php $i++; ?>
                        <div class= "form-group row justify-content-center">
                            <div class="col-md-11">
                                <hr>
                            </div>
                        </div>
                        @endforeach
                        

                   
        


            
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection