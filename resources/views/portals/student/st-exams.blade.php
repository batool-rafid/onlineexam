@extends('layouts.student')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Your Exams</div>

                <div class="card-body">
                <table class="table ">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Material</th>
                        <th scope="col">Name</th>
                        <th scope="col">Discription</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1 ; ?>
                    @foreach($exams as $exam)

                    <tr>
                        <th scope="row">{{$counter}}</th>
                        <td>{{$exam->material}}</td>
                        <td>{{$exam->name}}</td>
                        <td>{{$exam->discription}}</td>
                        <td><a href="{{route('exam.show',$exam->id)}}" class="btn btn-primary" style="margin-left: 50px">Start</a></td>
                    </tr> 
                    <?php $counter++ ; ?>

                    @endforeach
                    
        
                    
                    
                    </tbody>
                    
                    </table>
                    {{$exams->links()}}
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection