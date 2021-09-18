@extends('layouts.student')
@section('styles')


@endsection



@section('content')
<section class="section">
  <div class="section-body">
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-4">
        <div class="card author-box">
          <div class="card-body">
            <div class="author-box-center">
              <img alt="image" src="{{ asset('storage/app/'.$bst->g_batch->group->img1) }}" class="author-box-picture">
              <div class="clearfix"></div>
              <div class="author-box-name">
                <a href="#">{{$bmc->g_batch->group->title}}</a>
              </div>
              <div class="author-box-job"><b>{{$bmc->g_mcq->number}}. {{$bmc->g_mcq->title}}</b> </div>
            
            </div>
            <div class="media-progressbar p-t-10">
                {{$mark->average}}%
                <div class="progress" data-height="6" style="height: 6px;">
                  <div class="progress-bar bg-success" data-width="{{$mark->average}}%" style="width: {{$mark->average}}%;"></div>
                </div>
            </div>
          </div>
        </div>
       
        
        
      </div>
      <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="padding-20">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#Questions" role="tab"
                  aria-selected="true">Results</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#Answers" role="tab"
                  aria-selected="false">Answers</a>
              </li>
             
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
                <div class="tab-pane fade show active" id="Questions" role="tabpanel" aria-labelledby="home-tab2">
                   
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                          <tbody><tr>
                            <th data-width="40" style="width: 40px;">Q</th>
                            <th class="text-center">Your Ans:</th>
                            <th class="text-center">Correct Ans:</th>
                            <th class="text-center">Result</th>
                            <th class="text-right">Marks</th>
                          </tr>
                          @foreach ($mark->m_results as $rst)
                          <tr>
                            <td>{{$rst->q_number}}</td>
                            <td class="text-center">{{$rst->s_answer}}</td>
                            <td class="text-center">{{$rst->q_answer}}</td>
                            <td class="text-center">
                                @if ($rst->result==1)
                                <span class="badge badge-success">Correct</span>
                                @endif
                                @if ($rst->result==0)
                                <span class="badge badge-danger">Wrong</span>
                                @endif
                                
                            </td>
                            <td class="text-right">{{$rst->s_mark}}</td>
                          </tr>
                          @endforeach
                          <tr>
                            <th colspan="4">Total Marks</th>
                            <th class="text-right">{{$mark->student_mark}}</th>
                          </tr>
                          <tr>
                            <th colspan="4">Average</th>
                            <th class="text-right">{{$mark->average}}%</th>
                          </tr>
                         
                        </tbody>
                    </table>
                    </div>
                    
                </div>
                <div class="tab-pane fade" id="Answers" role="tabpanel" aria-labelledby="profile-tab2">
                    @foreach ($bmc->g_mcq->m_questions as $mqu)
                    <div class="card">
                        <div class="card-header">
                          <h4>Question {{$mqu->number}}</h4>
                          
                        </div>
                        <div class="card-body">
                          
                         
                                <img alt="image" src="{{ asset('storage/app/'.$mqu->q_img) }}" class="img-fluid">
                           
                                <div class="mb-2 text-muted text-right">
                                    Marks: {{$mqu->marks}} |
                                    Answer: 
                                    @if ($mqu->ans==1)
                                        1
                                    @endif
                                    @if ($mqu->ans==2)
                                        2
                                    @endif
                                    @if ($mqu->ans==3)
                                        3
                                    @endif
                                    @if ($mqu->ans==4)
                                        4
                                    @endif
                                    @if ($mqu->ans==5)
                                        5
                                    @endif
                                </div>
                                
                        </div>
                        <div class="card-header">
                            <h4>Answer</h4>
                            
                        </div>
                        @if ($mqu->s_img)
                        <div class="card-body">
                          
                         
                            <img alt="image" src="{{ asset('storage/app/'.$mqu->s_img) }}" class="img-fluid">
                       
                            
                            
                        </div>
                        @endif
                        @if ($mqu->s_vid)
                        <div class="card-body">
                          
                         
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{$mqu->s_vid}}" allowfullscreen></iframe>
                            </div>
                       
                            
                            
                        </div>
                        @endif
                        @if ($mqu->s_audio)
                        <div class="card-body">
                          
                         
                            <audio controls>
                                                          
                                <source src="{{ asset('storage/app/'.$mqu->s_audio) }}" type="audio/mpeg">
                              Your browser does not support the audio element.
                              </audio>
                       
                            
                            
                        </div>
                        @endif
                        @if ($mqu->s_des)
                        <div class="card-body">
                          
                         
                           {!!$mqu->s_des!!}
                       
                            
                            
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
               
             
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')


@endsection