@extends('layouts.app')
@section('left-nav')
<li class="nav-item">
  <a class="nav-link" href="{{ route('lecturer.index') }}">{{ __('Home') }}</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('exam.create') }}">{{ __('Create Exam') }}</a>
</li>
@endsection

