@extends('layouts.lecturer')
@section('title','Edit Exam')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Exam {{$exam->name}}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('exam.update',$exam) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        @include('errors.errmsg')
                        @if(session('msg'))
                            <div class="alert alert-success">
                                {{session('msg')}}
                            </div>
                        @endif
                    

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Exam Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$exam->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="discription" class="col-md-4 col-form-label text-md-right">{{ __('Discription') }}</label>

                            <div class="col-md-6">
                                <textarea name="discription" class="form-control @error('discription') is-invalid @enderror" cols="30" rows="10" value="{{ old('discription') }}" autocomplete="discription" autofocus>{{$exam->discription}}</textarea>
                                @error('discription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row"  id="stage">
                            <label for="stage" class="col-md-4 col-form-label text-md-right">{{ __('Stage') }}</label>
                            <div class="col-md-6">
                            <select class="form-control"  name="stage" >
                                @for($i=1 ; $i<=5 ;$i++)
                                @if($i == $exam->stage)
                                <option selected>{{$i}}</option>
                                @else
                                <option >{{$i}}</option>
                                @endif
                                @endfor 
                                
                            
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="material" class="col-md-4 col-form-label text-md-right">{{ __('Material Name') }}</label>

                            <div class="col-md-6">
                                <input id="material" name="material" type="text" class="form-control @error('material') is-invalid @enderror" material="material" value="{{ $exam->material}}" required autocomplete="material" autofocus>

                                @error('material')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration in minuts') }}</label>

                            <div class="col-md-6">
                                <input id="duration" name="duration" type="number" class="form-control @error('duration') is-invalid @enderror" value="{{$exam->duration }}" required autocomplete="duration" autofocus>

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="datetime" class="col-md-4 col-form-label text-md-right">{{ __('Date and Time') }}</label>

                            <div class="col-md-6">
                                <input id="datetime" name="datetime" type="datetime-local" class="form-control @error('datetime') is-invalid @enderror" value=<?php echo date('Y-m-d\TH:i:s', strtotime($exam->datetime)); ?> required autocomplete="datetime" autofocus>

                                @error('datetime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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