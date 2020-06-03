
@extends( (Auth::user()->role->name == 'Student' ) ? 'layouts.student':'layouts.lecturer')

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
                        <th scope="col">Status</th> 
                        <th scope="col">Created At</th>  
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
                        <td>{{$exam->status}}</td>
                        <td>{{$exam->created_at}}</td>
                        <td>
                        <div style="width: 250px;">
                        @if(auth::user()->role->name == 'Student' && $exam->status == 'Waiting')
                        <a href="{{route('exam.show',$exam->id)}}" class="btn btn-primary" style="margin-left: 20px">Start</a>
                        @endif
                        @if(auth::user()->role->name == 'Lecturer')
                        <a href="{{route('question.showquestions',$exam)}}" class="btn btn-primary" style="margin-left: 20px">View</a>
                        @if($exam->status == 'Waiting')
                        <a href="{{route('exam.edit',$exam)}}" class="btn btn-success" style="margin-left: 20px; margin-right: 0px">Edit</a>
                        <div class="float-right">
                        <form action="{{route('exam.destroy',$exam)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                        
                

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