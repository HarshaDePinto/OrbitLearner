@extends('layouts.teacher')
@section('styles')


@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="btn-group mb-3" role="group" aria-label="Basic example">
            <a href="{{route('teacher_b_online',$batch->id)}}" class="btn btn-success">Online</a>
            <a href="{{route('teacher_b_students',$batch->id)}}" class="btn btn-primary ">Students</a>
            <a href="{{route('teacher_b_tutorial',$batch->id)}}" class="btn btn-info ">Tutorial</a>
            <a href="{{route('teacher_b_video',$batch->id)}}" class="btn btn-warning ">Video</a>
            <a href="{{route('teacher_b_mcq',$batch->id)}}" class="btn btn-success ">MCQ</a>
            <a href="{{route('teacher_b_essay',$batch->id)}}" class="btn btn-info ">Essay</a>
            <a href="{{route('teacher_b_single',$batch->id)}}" class="btn btn-primary ">Edit</a>
        </div>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="padding-20">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#Classes" role="tab"
                      aria-selected="true">Classes</a>
                  </li>
                  
                  
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                  <div class="tab-pane fade show active" id="Classes" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="card">
                      <div class="card-header">
                        <h4>Online Classes of {{$batch->user->title}} {{$batch->user->f_name}} {{$batch->user->l_name}} | {{$batch->grade->title}} | {{$batch->year}} | {{$batch->title}}</h4>
                        
                      </div>
                      <div class="card-body">
                       
                        
                        <div class="card-header">
                          <h4>All Classes</h4>
                        </div>
                        <div class="card-body">
                          <div id="accordion">
                            @foreach ($batch->onlines as $on)
                            <div class="accordion">
                              <div class="accordion-header collapsed" role="button" data-toggle="collapse" data-target="#panel-body-{{$on->id}}" aria-expanded="false">
                                <h4>{{$on->topic}} |{{date('Y-M-d', strtotime($on->start_time))}}|{{date('g:i A', strtotime($on->start_time))}}</h4>
                                <div class="text-success text-small font-600-bold">Updated By {{$on->author}} <br>On {{date('d-M-Y', strtotime($on->updated_at))}}</div>
                              </div>
                              <div class="accordion-body collapse" id="panel-body-{{$on->id}}" data-parent="#accordion" style="">
                                <form method="POST" enctype="multipart/form-data" action="{{route('teacher_b_zoom')}}">
                                  @csrf
                                
                                  
                                  <input type="hidden" name="meeting_id" value="{{$on->meeting_id}}">
                                  <input type="hidden" name="meeting_pass" value="{{$on->meeting_password}}">
                                  <button type="submit" class="btn btn-primary btn-sm">Start As Host</button>
                                    <br>
                                  
                                </form>

                                <div class="card-footer pt-0 text-left">
                                    <br>
                                  <a href="#" class="btn btn-danger text-white">Delete</a>
                                </div>
                              </div>
                            </div>
                            @endforeach
                            
                            
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
    </div>
</section>

@endsection

@section('scripts')

@endsection