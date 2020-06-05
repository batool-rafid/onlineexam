@extends('layouts.lecturer')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add questions to exam {{$exam->name}}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('question.store') }}">
                <input type="hidden" name="exam_id" value={{$exam->id}}>
                <input type="hidden" name="exam_len" value={{$exam->questionsnum}}>
                        @csrf
                        @include('errors.errmsg')
                        @if(session('msg'))
                            <div class="alert alert-success">
                                {{session('msg')}}
                            </div>
                        @endif
                        <?php $i= 1; ?> 
                        @for($e=1; $e<= $exam->questionsnum ; $e++)

                        <div class="form-group row">
                            <label for=<?php echo "q_".$i ?> class="col-md-2 col-form-label text-md-right"><b>Question {{$i}}</b></label>

                            <div class="col-md-8">
                                <textarea name=<?php echo "q_".$i ?> class="form-control " cols="35" rows="4" value="{{ old(<?php echo "q_".$i ?>) }}"  autofocus></textarea>

                            </div>
                        </div>
                        <?php $c= 1; ?> 
                        @for($k = 1 ; $k <= 4  ; $k++ )
                        <div class="form-group row">
                            <label for=<?php echo "qch_".$i."_".$c ?> class="col-md-2 col-form-label text-md-right">Choice {{$c}}</label>

                            <div class="col-md-8">
                                <textarea name=<?php echo "qch_".$i."_".$c ?>  class="form-control " cols="35" rows="2" value="{{ old(<?php echo "qch_".$i."_".$c ?> ) }}" autofocus></textarea>

                            </div>
                        </div>
                        <?php $c++; ?> 
                        @endfor
                        <div class="form-group row"  id=<?php echo "correct_".$i ?>>
                            <label for=<?php echo "correct_".$i ?> class="col-md-2 col-form-label text-md-right">{{ __('Correct Choice') }}</label>
                            <div class="col-md-8">
                            <select class="form-control" style="background-color: #b3ffcc;"  name=<?php echo "correct_".$i ?> value="{{ old('correct') }}" >
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
                        @endfor







                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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