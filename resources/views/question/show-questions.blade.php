
@extends( (Auth::user()->role->name == 'Student' ) ? 'layouts.student':'layouts.lecturer')
<?php 
 function status($exam){
if(strtotime($exam->datetime) <= time() && (strtotime($exam->datetime) + $exam->duration * 60) > time()){
     return "In-progress";
}
elseif((strtotime($exam->datetime) + $exam->duration * 60) > time()){
    return "Waiting";
}else{
    return "Finished";
}
}
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Exam {{$exam->name}} Questions
                @if(status($exam) == "Waiting")
                <div class="float-right">
                <a href="{{route('question.create_question',$exam->id)}}" class="btn btn-outline-primary">Add Questiion</a>
                </div>
                @endif
                </div>

                <div class="card-body">
                @if(session('msg'))
                            <div class="alert alert-success">
                                {{session('msg')}}
                            </div>
                        @endif
                        <div class="table-responsive">

                <table class="table ">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Question</th>
                        <th scope="col">Ch1</th>
                        <th scope="col">Ch2</th>
                        <th scope="col">Ch3</th>  
                        <th scope="col">Ch4</th>  
                        <th scope="col">Correct</th>
                        @if(auth::user()->role->name == 'Lecturer')
                        <th scope="col">Actions</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 1 ; ?>
                    @foreach($questions as $question)

                    <tr>
                        <th scope="row">{{$counter}}</th>
                        <td>{{$question->question}}</td>
                        <td>{{$question->choice_1}}</td>
                        <td>{{$question->choice_2}}</td>
                        <td>{{$question->choice_3}}</td>
                        <td>{{$question->choice_4}}</td>
                        <td>{{$question->correct}}</td>
                        <td style="width: 190px;">
                        @if(auth::user()->role->name == 'Lecturer')
                        @if(status($exam) == "Waiting")
                        <a href="{{route('question.edit',$question)}}" class="btn btn-success" style="margin-left: 20px; margin-right: 0px">Edit</a>
                        <div class="float-right">
                        <form action="{{route('question.destroy',$question)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                        
                

                        @endif
                        @endif
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
</div>


@endsection