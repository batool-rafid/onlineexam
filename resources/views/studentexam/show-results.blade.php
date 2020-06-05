
@extends('layouts.lecturer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Exam Results
                </div>

                <div class="card-body">
                @if(session('msg'))
                            <div class="alert alert-success">
                                {{session('msg')}}
                            </div>
                        @endif
                <table class="table ">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Student</th>
                        <th scope="col">Score</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1 ; ?>
                    @foreach($results as $result)

                    <tr>
                        <th scope="row">{{$counter}}</th>
                        <td>{{$result->user->name}}</td>
                        <td>{{$result->score}}</td>
                        <td >
                        <a href="{{route('answer.show-answers',$result)}}" class="btn btn-primary" style="margin-left: 20px">Show Answer</a>
                        </td>
                    </tr> 
                    <?php $counter++ ; ?>

                    @endforeach
                                    
                    </tbody>
                    
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection