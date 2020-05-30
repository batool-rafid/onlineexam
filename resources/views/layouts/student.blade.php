@extends('layouts.app')
@section('left-nav')
<li class="nav-item">
  <a class="nav-link" href="{{ route('student.index') }}">{{ __('Home') }}</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('exam.studentexams') }}">{{ __('My Exams') }}</a>
</li>
@endsection