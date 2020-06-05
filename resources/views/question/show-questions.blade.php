
@extends( (Auth::user()->role->name == 'Student' ) ? 'layouts.student':'layouts.lecturer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Exam {{$exam->name}} Questions
                <div class="float-right">
                <a href="{{route('question.create_question',$exam->id)}}" class="btn btn-outline-primary">Add Questiion</a>
                
                </div>
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
                        <td style="width: 250px;">
                        @if(auth::user()->role->name == 'Lecturer')
                        <a href="{{route('question.show',$question)}}" class="btn btn-primary" style="margin-left: 20px">View</a>
                        @if($exam->status == 'Waiting')
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


@endsection