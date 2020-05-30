@extends('layouts.app')
@section('left-nav')
<li class="nav-item">
  <a class="nav-link" href="{{ route('admin.index') }}">{{ __('Home') }}</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="{{ route('login') }}">{{ __('Students') }}</a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ route('login') }}">{{ __('Lecturers') }}</a>
</li>
@endsection
