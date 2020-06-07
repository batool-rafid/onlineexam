@extends('layouts.student')
<?php $t = time(); ?>
@section('js')
<script type="text/javascript">
var TimeLimit ;
function cancel_start() {

  var x = document.getElementById("submit");
  x.style.display = "none" 
  alert("Sorry your time has finished!");  
  
}
window.onload = function() {
    countdownto();
};


<?php 
if (Cookie::has('time'.$exam->id))
{
    $t = Cookie::get('time'.$exam->id);
}
else
{   
     Cookie::queue(Cookie::make('time'.$exam->id,$t)); 
}
?>

TimeLimit = new Date('<?php echo date('r', $t + 5) ?>');
</script>
<script type="text/javascript">
var x = 1 ;  var f = 1 ;
const div = document.createElement('div');
div.className = 'form-group row';
function countdownto() {
  var date = Math.round((TimeLimit-new Date())/1000);
  var hours = Math.floor(date/3600);
  date = date - (hours*3600);
  var mins = Math.floor(date/60);
  date = date - (mins*60);
  var secs = date;
  if (hours<10) hours = hours;
  if (mins<10) mins = mins;
  if (secs<10) secs = secs;

if( secs <= 0 && mins <= 0 && hours <= 0 || hours < 0) {
      f = 0;
      cancel_start();  
      div.innerHTML = '00'+':'+'00'+':'+'00' ;    
}else{

    div.innerHTML = '0'+hours+':'+'0'+mins+':'+'0'+secs ;
}

if(x){
document.getElementById('ccc').appendChild(div);
x = 0 ;
}
if(Boolean(f))
  setTimeout("countdownto()",1000);
  }

</script>


@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Answering Exam {{$exam->name}}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('exam.student-exam.store',$exam) }}">
                <input type="hidden" name="exam_id" value={{$exam->id}}>
                <input type="hidden" name="exam_len" value={{$exam->questionsnum}}>
                        @csrf
                        @include('errors.errmsg')
                        @if(session('msg'))
                            <div class="alert alert-success">
                                {{session('msg')}}
                            </div>
                        @endif

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right"><b>Time Remaining</b></label>

                            <div class="col-md-8" id="ccc">
                                
                            </div>
                        </div>
                        


                        <?php $i=1; ?>
                        @foreach($questions as $question)
                        <div class="form-group row">
                            <label for="{{$question->question}}" class="col-md-2 col-form-label text-md-right"><b>Question {{$i}}</b></label>

                            <div class="col-md-8">
                                {{$question->question}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$question->choice_1}}" class="col-md-2 col-form-label text-md-right"><b>Choice 1</b></label>

                            <div class="col-md-8">
                                {{$question->choice_1}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$question->choice_2}}" class="col-md-2 col-form-label text-md-right"><b>Choice 2</b></label>

                            <div class="col-md-8">
                                {{$question->choice_2}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$question->choice_3}}" class="col-md-2 col-form-label text-md-right"><b>Choice 3</b></label>

                            <div class="col-md-8">
                                {{$question->choice_3}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="{{$question->choice_4}}" class="col-md-2 col-form-label text-md-right"><b>Choice 4</b></label>

                            <div class="col-md-8">
                                {{$question->choice_4}}
                            </div>
                        </div>
                        <div class="form-group row"  id="correct_{{$question->id}}">
                            <label for="correct_{{$question->id}}" class="col-md-2 col-form-label text-md-right">{{ __('Correct Choice') }}</label>
                            <div class="col-md-8">
                            <select class="form-control" style="background-color: #b3ffcc;"  name="correct_{{$question->id}}" value="{{ old('correct') }}" >
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                            </div>
                        </div>
                        <?php $i++; ?>
                        <div class= "form-group row justify-content-center">
                            <div class="col-md-11">
                                <hr>
                            </div>
                        </div>
                        @endforeach
                        

                   
        


            
                    
                        <div class="form-group row mb-0">
                            <div class="col-md-2 offset-md-2">
                                <button type="submit" class="btn btn-primary" id="submit">
                                    {{ __('Submit') }}
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