
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your Exams</div>

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
                        <th scope="col">Material</th>
                        <th scope="col">Name</th>
                        <th scope="col">Discription</th>
                        @if(auth::user()->role->name == 'Lecturer')
                        <th scope="col">Stage</th>  
                        @endif
                        <th scope="col">Q/N</th> 
                        <th scope="col">Status</th> 
                        @if(auth::user()->role->name == 'Student')
                        <th>Score</th>
                        @endif
                        <th scope="col">Date</th>  
                        <th scope="col">Duration(mins)</th>  
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
                        @if(auth::user()->role->name == 'Lecturer')
                        <td>{{$exam->stage}}</td>
                        
                        @endif
                        <td>{{$exam->questionsnum}}</td>
                        <td>{{status($exam)}}</td>
                        @if(auth::user()->role->name == 'Student')
                        <?php $score =auth::user()->examScore($exam->id);
                        $sub =auth::user()->examSub($exam->id);
                        ?>
                        <td>
                        {{$score}}
                
                        </td>





                        @endif
                        <td>{{$exam->datetime}}</td>
                        <td>{{$exam->duration}}</td>
                        <td>
                        <div style="width: 250px;">
                        @if(auth::user()->role->name == 'Student' && status($exam) =="In-progress" && $sub != true )
                        <a href="{{route('exam.student-exam.create',$exam)}}" class="btn btn-primary" style="margin-left: 20px">Enrol</a>
                        @endif
                        @if(auth::user()->role->name == 'Lecturer')
                        <a href="{{route('question.showquestions',$exam)}}" class="btn btn-primary" style="margin-left: 20px">View</a>
                        @if(status($exam) =="Waiting")
                        <a href="{{route('exam.edit',$exam)}}" class="btn btn-success" style="margin-left: 20px; margin-right: 0px">Edit</a>
                        <div class="float-right">
                        <form action="{{route('exam.destroy',$exam)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                        @else
                        <a href="{{route('studentexam.show-results',$exam)}}" class="btn btn-primary" style="margin-left: 20px">Results</a>
                        @endif
                        @endif    
                        </div>
                    
                        </td>
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