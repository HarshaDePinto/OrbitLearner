@extends('layouts.admin')
@section('styles')
<title>{{$batch->year}} | {{$batch->title}} | Online</title>

@endsection

@section('content')
<section class="section">
    <div class="section-body">
      <div class="btn-group mb-3" role="group" aria-label="Basic example">
        <a href="{{route('admin_teacher_batch_online',$batch->id)}}" class="btn btn-success">Online</a>
        <a href="{{route('admin_teacher_batch_students',$batch->id)}}" class="btn btn-primary ">Students</a>
        <a href="{{route('admin_teacher_batch_tutorial',$batch->id)}}" class="btn btn-info ">Tutorial</a>
        <a href="{{route('admin_teacher_batch_video',$batch->id)}}" class="btn btn-warning ">Video</a>
        <a href="{{route('admin_teacher_batch_mcq',$batch->id)}}" class="btn btn-success ">MCQ</a>
        <a href="{{route('admin_teacher_batch_essay',$batch->id)}}" class="btn btn-info ">Essay</a>
        <a href="{{route('admin_teacher_batch_single',$batch->id)}}" class="btn btn-primary ">Edit</a>
      </div>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#Classes" role="tab"
                      aria-selected="true">Classes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#AddAClass" role="tab"
                      aria-selected="false">Add A Class</a>
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
                                <form method="POST" enctype="multipart/form-data" action="{{route('teacher_zoom_meeting')}}">
                                  @csrf
                                
                                  
                                  <input type="hidden" name="meeting_id" value="{{$on->meeting_id}}">
                                  <input type="hidden" name="meeting_pass" value="{{$on->meeting_password}}">
                                  <button type="submit" class="btn btn-primary btn-sm">Start As Host</button>
                               
                                  
                                </form>

                                <div class="card-footer pt-0 text-left">
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
                  <div class="tab-pane fade" id="AddAClass" role="tabpanel" aria-labelledby="profile-tab2">
                    <div class="card">
                      <div class="card-header">
                        <h4>Create A Classes</h4>
                       
                      </div>
                      <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route('create_zoom_meeting')}}">
                            @csrf
                            
                        
                            <div class="form-group">
                              <label>Zoom Account</label>
                              <select class="form-control" name="zoom_account_id">
                                @foreach ($zAccounts as $acc)
                                
                                <option value="{{$acc->id}}">{{$acc->title}}</option>
                                
                                
                                @endforeach
                                
                               
                              </select>
                              
                            </div>
                          
                            <div class="form-group">
                                <label>Meeting Topic</label>
                                <input type="text" class="form-control" name="meeting_topic" required>
                                
                            </div>
                            <div class="form-group">
                                <label>Meeting Agenda</label>
                                <input type="text" class="form-control" name="meeting_agenda" required>
                                
                            </div>

                              <div class="form-group">
                                <label>Date & Time</label>
                                <input type="datetime-local" class="form-control" name="date" required>
                                
                              </div>
                           
                              <div class="form-group">
                                <label>Duration In Minutes</label>
                                <input type="text" class="form-control" name="meeting_duration" required>
                                
                              </div>
                           
                            
                              
                            
                            
                            
                          
                         
                          <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                          <input type="text" class="form-control" name="g_batch_id" value="{{$batch->id}}" hidden>
                          <div class="card-footer pt-0 text-right">
                            <button type="submit" class="btn btn-primary">Create</button>
                          </div>
                       
                        </form>
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