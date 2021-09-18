@extends('layouts.student')

@section('content')

<section class="section">
    <div class="section-header">
        <h3>{{$paper->title}} <span id="display" style="color:#FF0000;"></span>
          <span id="submitted" style="color:#FF0000;"></span></h3>
    </div>
    <div class="section-body">
        <form method="POST" action="{{route('student_mcq_submit')}}" role="form" id="MCQuestion">
            @csrf

        @foreach ($paper->m_questions as $mqu)
                    <div class="card">
                        <div class="card-header">
                          <h4>Question {{$mqu->number}}</h4>
                         
                        </div>
                        <div class="card-body">
                          
                         
                                <img alt="image" src="{{ asset('storage/app/'.$mqu->q_img) }}" class="img-fluid">
                           
                                <div class="form-group col-md-6 col-12">
                                    
                                    <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                            <input type="radio" name="{{$mqu->id}}" value="0" class="selectgroup-input-radio" checked id="E{{$mqu->id}}">
                                            <span class="selectgroup-button">Please Select</span>
                                    </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="{{$mqu->id}}" value="1" class="selectgroup-input-radio" id="A{{$mqu->id}}">
                                        <span class="selectgroup-button">1</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="{{$mqu->id}}" value="2" class="selectgroup-input-radio" id="B{{$mqu->id}}">
                                        <span class="selectgroup-button">2</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="{{$mqu->id}}" value="3" class="selectgroup-input-radio" id="C{{$mqu->id}}">
                                        <span class="selectgroup-button">3</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="{{$mqu->id}}" value="4" class="selectgroup-input-radio" id="D{{$mqu->id}}">
                                        <span class="selectgroup-button">4</span>
                                      </label>
                                      @if ($paper->type==1)
                                      <label class="selectgroup-item">
                                        <input type="radio" name="{{$mqu->id}}" value="5" class="selectgroup-input-radio" id="F{{$mqu->id}}">
                                        <span class="selectgroup-button">5</span>
                                      </label>
                                      @endif
                                    </div>
                                </div>
                                
                                
                        </div>
                    </div>
        @endforeach
        <div class="form-group col-md-6 col-12">
              <input type="text" name="b_student_id" value="{{$bst->id}}" hidden>
              <input type="text" name="b_mcq_id" value="{{$bmc->id}}" hidden> 
                                  
          <button type="submit" class="btn btn-danger">Submit My Answers</button>
          
      </div>
        </form>
        
    </div>
</section>


@endsection

@section('scripts')
    <script>
        var div = document.getElementById('display');
        var submitted = document.getElementById('submitted');

        function CountDown(duration, display) {

                    var timer = duration, minutes, seconds;

                var interVal=  setInterval(function () {
                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;
                display.innerHTML ="<b>" + minutes + "m : " + seconds + "s" + "</b>";
                        if (timer > 0) {
                        --timer;
                        }else{
                clearInterval(interVal)
                            SubmitFunction();
                        }

                },1000);

            }

        function SubmitFunction(){
            submitted.innerHTML="Time is up!";
            document.getElementById('MCQuestion').submit();

        }
        CountDown({{($paper->time)*60}},div);
    </script>
@endsection