@extends('layouts.lecturer')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Exam</div>

                <div class="card-body">
                <form method="POST" action="{{ route('exam.store') }}">
                        @csrf
                        @include('errors.errmsg')
                        @if(session('msg'))
                            <div class="alert alert-success">
                                {{session('msg')}}
                            </div>
                        @endif

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Exam Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <textarea name="discription" class="form-control @error('discription') is-invalid @enderror" cols="30" rows="10" value="{{ old('discription') }}" autocomplete="discription" autofocus></textarea>
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
                            <select class="form-control"  name="stage" value="{{ old('stage') }}" >
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="material" class="col-md-4 col-form-label text-md-right">{{ __('Material Name') }}</label>

                            <div class="col-md-6">
                                <input id="material" name="material" type="text" class="form-control @error('material') is-invalid @enderror" material="material" value="{{ old('material') }}" required autocomplete="material" autofocus>

                                @error('material')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="questionsnum" class="col-md-4 col-form-label text-md-right">{{ __('Questions Number') }}</label>

                            <div class="col-md-6">
                                <input id="questionsnum" name="questionsnum" type="number" class="form-control @error('questionsnum') is-invalid @enderror" value="{{ old('questionsnum') }}" required autocomplete="questionsnum" autofocus>

                                @error('questionsnum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration in minuts') }}</label>

                            <div class="col-md-6">
                                <input id="duration" name="duration" type="number" class="form-control @error('duration') is-invalid @enderror" value="{{ old('duration') }}" required autocomplete="duration" autofocus>

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
                                <input id="datetime" name="datetime" type="datetime-local" class="form-control @error('datetime') is-invalid @enderror" value="{{ old('datetime') }}" required autocomplete="datetime" autofocus>

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