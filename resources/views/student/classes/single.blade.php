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
              <img alt="image" src="{{ asset('storage/app/'.$batch->g_batch->group->img1) }}" class="author-box-picture">
              <div class="clearfix"></div>
              <div class="author-box-name">
                <a href="#">{{$batch->g_batch->group->title}}</a>
              </div>
              <div class="author-box-job"><b>{{$batch->g_batch->user->title}} {{$batch->g_batch->user->f_name}} {{$batch->g_batch->user->l_name}}</b> </div>
              <div class="author-box-job"><b>{{$batch->g_batch->grade->title}}</b> </div>
              <div class="author-box-job"><b>{{$batch->g_batch->year}} | {{$batch->g_batch->title}}</b> </div>
              
             
             
            </div>
           
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4>Class Summery</h4>
          </div>
          <div class="card-body">
              <form action=""></form>
            <div class="py-4">
              
              <p class="clearfix">
                <span class="float-left">
                  MCQ
                </span>
                <span class="float-right text-muted">
                  {{$batch->g_batch->b_mcqs->count()}}
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Essay
                </span>
                <span class="float-right text-muted">
                  
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Tutorial
                </span>
                <span class="float-right text-muted">
                  {{$batch->g_batch->b_tutorials->count()}}
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Video
                </span>
                <span class="float-right text-muted">
                  {{$batch->g_batch->b_videos->count()}}
                </span>
              </p>
             
              
            </div>
          </div>
        </div>
        
       
        
      </div>
      <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="padding-20">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#Online" role="tab"
                  aria-selected="true">Online</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " id="home-tab2" data-toggle="tab" href="#MCQ" role="tab"
                  aria-selected="true">MCQ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " id="home-tab2" data-toggle="tab" href="#Tutorials" role="tab"
                  aria-selected="true">Tutorials</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " id="home-tab2" data-toggle="tab" href="#Videos" role="tab"
                  aria-selected="true">Videos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " id="home-tab2" data-toggle="tab" href="#Payments" role="tab"
                  aria-selected="true">Payments</a>
              </li>
             
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              <div class="tab-pane fade show active" id="Online" role="tabpanel" aria-labelledby="home-tab2">
                <div class="card">
                  <div class="card-header">
                  <h4 class="text-info">Online Classes</h4>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-striped table-md">
                            <tbody>
                                <tr>
                    
                                  <th>Title</th>
                                  <th>Start</th>
                                  <th>Join</th>
                                </tr>
                                  @foreach ($batch->g_batch->onlines as $online)
                                  <tr>
                                    <td>
                                        {{$online->topic}}
                                    </td>
                                    
                                    <td>
                                        
                                      {{date('Y-M-d', strtotime($online->start_time))}}
                                      <br>
                                      {{date('g:i A', strtotime($online->start_time))}}
                                    </td>
                                    
                               
                                    <td>
                                      <form method="POST" enctype="multipart/form-data" action="{{route('select_zoom_meeting')}}">
                                        @csrf
                                      
                                        
                                        <input type="hidden" name="meeting_id" value="{{$online->meeting_id}}">
                                        <input type="hidden" name="meeting_pass" value="{{$online->meeting_password}}">
                                        <button type="submit" class="btn btn-primary btn-sm">Join</button>
                                     
                                        
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                                    
                                    
                               
                               
                                
                            </tbody>
                          </table>
                      </div>
                  </div>
                </div>
               
              </div>
              <div class="tab-pane fade" id="MCQ" role="tabpanel" aria-labelledby="home-tab2">
                <div class="card">
                  <div class="card-header">
                  <h4 class="text-info">MCQ Papers | Have To Do</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                
                              <th>Title</th>
                              <th>Time</th>
                              <th>Do Now</th>
                              
                            </tr>
                            @if ($batch->g_batch->b_mcqs->where('is_active',1)->count()!=0)
                              @foreach ($batch->g_batch->b_mcqs->where('is_active',1) as $mcq)
                              @if ($batch->m_marks->where('b_mcq_id',$mcq->id)->count()==0)
                                <tr>
                                  <td>{{$mcq->g_mcq->title}}</td>
                                  
                                  <td>
                                      {{$mcq->g_mcq->time}} min
                                  </td>
                                  
                                  
                                  <td>
                                      
                                    <a href="{{route('student_paper_do',$mcq->id)}}" class="btn btn-sm btn-danger" target="_blank">Do Now</a>
                                  </td>
                                </tr>
                              @endif
                                
                              @endforeach
                            @endif
                           
                            
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-header">
                  <h4 class="text-success">MCQ Papers | Finished</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                
                              <th>Title</th>
                              <th>Time</th>
                              <th>Results</th>
                              
                            </tr>
                            @if ($batch->g_batch->b_mcqs->where('is_active',1)->count()!=0)
                              @foreach ($batch->g_batch->b_mcqs->where('is_active',1) as $mcq)
                              @if ($batch->m_marks->where('b_mcq_id',$mcq->id)->count()!=0)
                                <tr>
                                  <td>{{$mcq->g_mcq->title}}</td>
                                  
                                  <td>
                                      {{$mcq->g_mcq->time}} min
                                  </td>
                                  
                                  
                                  <td>
                                      
                                    <a href="{{route('student_paper_result',$mcq->id)}}" class="btn btn-sm btn-success" target="_blank">Result</a>
                                  </td>
                                </tr>
                              @endif
                                
                              @endforeach
                            @endif
                           
                            
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
               
              </div>
              <div class="tab-pane fade" id="Tutorials" role="tabpanel" aria-labelledby="home-tab2">
                <div class="card">
                  <div class="card-header">
                  <h4 class="text-info">Tutorials</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                
                              <th>Title</th>
                              <th>View</th>
                              
                              
                            </tr>
                            @if ($batch->g_batch->b_tutorials->where('is_active',1)->count()!=0)
                              @foreach ($batch->g_batch->b_tutorials->where('is_active',1) as $tut)
                              
                                <tr>
                                  <td>{{$tut->g_tutorial->title}}</td>
                                  
                                  <td>
                                      
                                    <a href="{{route('student_tutorial_single',$tut->id)}}" class="btn btn-sm btn-primary" target="_blank">View</a>
                                  </td>
                                </tr>
                              
                                
                              @endforeach
                            @endif
                           
                            
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

               
               
              </div>
              <div class="tab-pane fade" id="Videos" role="tabpanel" aria-labelledby="home-tab2">
                <div class="card">
                  <div class="card-header">
                  <h4 class="text-info">Videos</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                
                              <th>Title</th>
                              <th>View</th>
                              
                              
                            </tr>
                            @if ($batch->g_batch->b_videos->where('is_active',1)->count()!=0)
                              @foreach ($batch->g_batch->b_videos->where('is_active',1) as $tut)
                              
                                <tr>
                                  <td>{{$tut->g_video->title}}</td>
                                  
                                  <td>
                                      
                                    <a href="{{route('student_video_single',$tut->id)}}" class="btn btn-sm btn-primary" target="_blank">View</a>
                                  </td>
                                </tr>
                              
                                
                              @endforeach
                            @endif
                           
                            
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

               
               
              </div>
              <div class="tab-pane fade" id="Payments" role="tabpanel" aria-labelledby="home-tab2">
                <div class="card">
                  <div class="card-header">
                  <h4 class="text-info">Payments</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-md">
                        <tbody>
                            <tr>
                
                              <th>Year</th>
                              <th>Month</th>
                              <th>Status</th>
                              
                              
                            </tr>
                            @if ($batch->g_batch->b_payments->count()!=0)
                              @foreach ($batch->g_batch->b_payments as $pay)
                              
                                <tr>
                                  <td>{{$pay->year}}</td>
                                  
                                  <td>
                                    {{$pay->month}} 
                                   
                                  </td>
                                  <td>
                                    @if ($pay->status==0)
                                    <div class="badge badge-danger">Not Paid</div>
                                    @endif
                                  </td>
                                </tr>
                              
                                
                              @endforeach
                            @endif
                           
                            
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

               
               
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