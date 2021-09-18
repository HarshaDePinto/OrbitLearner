@extends('layouts.admin')
@section('styles')
<title>{{$batch->year}} | {{$batch->title}}</title>
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.css') }}">
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
        
        <div class="col-12 col-md-12 col-lg-4">
          <div class="card author-box">
            <div class="card-body">
              <div class="author-box-center">
                @if ($batch->group->img1)
                <img alt="image" src="{{ asset('storage/app/'.$batch->group->img1) }}" class="author-box-picture">
                @else
                    <img src="{{ asset('public/front/images/cThu.jpg') }}" class="author-box-picture" />
                @endif
                
                <div class="clearfix"></div>
                <div class="author-box-name">
                  <a href="#">{{$batch->group->title}}</a>
                </div>
                <div class="author-box-job"><b>{{$batch->user->title}} {{$batch->user->f_name}} {{$batch->user->l_name}}</b> </div>
                <div class="author-box-job"><b>{{$batch->grade->title}}</b> </div>
                <div class="author-box-job"><b>{{$batch->year}} | {{$batch->title}}</b> </div>
                
                @if ($batch->is_active==1)
                <div class="author-box-job text-success"><b>Active</b> </div>
                @endif
                @if ($batch->is_active==0)
                <div class="author-box-job text-warning"><b>Deactive</b> </div>
                @endif
                <div class="text-center">
                    <div class="author-box-description">
                      
                    </div>
                    <div class="mb-2 mt-3">
                      @if ($batch->is_active==0)
                      <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{route('admin_teacher_batch_update',$batch->id)}}">
                        @csrf
                        @method('PUT')
                        <input type="text" class="form-control" value="1" name="is_active" hidden>
                        <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                        <button class="btn btn-success">Make Active</button>
                      </form>
                      @endif
                      @if ($batch->is_active==1)
                      <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{route('admin_teacher_batch_update',$batch->id)}}">
                        @csrf
                        @method('PUT')
                        <input type="text" class="form-control" value="0" name="is_active" hidden>
                        <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                        <button class="btn btn-warning">Make Deactive</button>
                      </form>
                      @endif
                      
                    </div>
                   
                    <div class="author-box-job"><b>Updated By: {{$batch->author}} <br> {{$batch->updated_at->diffForHumans()}}</b> </div>
                  </div>
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
                    Students
                  </span>
                  <span class="float-right text-muted">
                    {{$batch->b_students->count()}}
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    MCQ
                  </span>
                  <span class="float-right text-muted">
                    {{$batch->b_mcqs->count()}}
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
                    {{$batch->b_tutorials->count()}}
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Video
                  </span>
                  <span class="float-right text-muted">
                    {{$batch->b_videos->count()}}
                  </span>
                </p>
               
                
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <button class="btn btn-danger btn-sm btn-block" type="button" data-toggle="collapse"
                  data-target="#studentDelete" aria-expanded="false" aria-controls="studentDelete">
                  Delete
                </button>
            </div>
            <div class="card-body">
              
              <div class="collapse" id="studentDelete">
                
                  @if ($batch->b_students->count()==0)
                  <div class="alert alert-danger">
                    All the content including payment details, students results and related images will delete permanently from the system and will not be able to recover again. <b>Are you sure?</b>
                  </div>
                      
                      <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{route('admin_delete_batch')}}">
                        @csrf
                        
                        
                        <input type="text" class="form-control" name="id" value="{{$batch->id}}" hidden>
                       
                        <button class="btn btn-danger btn-block">Yes, Delete</button>
                      </form>
                  @else
                  <div class="alert alert-warning">
                    This class already conected with students. Please remove students from the class to delete! 
                  </div>
                  @endif
                  
                
              </div>
            </div>
          </div>
         
          
        </div>
        <div class="col-12 col-md-12 col-lg-8">
          <div class="card">
            <div class="padding-20">
              <ul class="nav nav-tabs" id="myTab2" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#Edit" role="tab"
                    aria-selected="true">Edit</a>
                </li>
               
              </ul>
              <div class="tab-content tab-bordered" id="myTab3Content">
                <div class="tab-pane fade show active" id="Edit" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin_teacher_batch_update',$batch->id)}}">
                                @csrf
                                @method('PUT')
                            <div class="card">
                              <div class="card-header">
                                <h4>Batch Details</h4>
                                
                              </div>
                              <div class="card-body pb-0">
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" class="form-control" name="year" value="{{$batch->year}}">
                                    
                                  </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$batch->title}}">
                                    
                                  </div>
                                <div class="form-group">
                                  <label>Status</label>
                                  <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                      <input type="radio" name="is_active" value="1" class="selectgroup-input-radio"
                                      @if ($batch->is_active==1)
                                      checked
                                      @endif
                                      >
                                      <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="radio" name="is_active" value="0" class="selectgroup-input-radio" 
                                      @if ($batch->is_active==0)
                                      checked
                                      @endif
                                      >
                                      <span class="selectgroup-button">Deactive</span>
                                    </label>
                                   
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label>Pay Type</label>
                                    <div class="selectgroup w-100">
                                      <label class="selectgroup-item">
                                        <input type="radio" name="type" value="1" class="selectgroup-input-radio"
                                        @if ($batch->type==1)
                                        checked
                                        @endif
                                        >
                                        <span class="selectgroup-button">Paid</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="type" value="0" class="selectgroup-input-radio" 
                                        @if ($batch->type==0)
                                        checked
                                        @endif
                                        >
                                        <span class="selectgroup-button">Free</span>
                                      </label>
                                     
                                      
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label>Class Day</label>
                                  <select class="form-control" name="day" required>
             
                                   
                                    <option value="Monday"
                                    @if ($batch->day==="Monday")
                                      selected  
                                    @endif
                                    >Monday</option>
                                    <option value="Tuesday"
                                    @if ($batch->day==="Tuesday")
                                    selected  
                                    @endif
                                    
                                    >Tuesday</option>
                                    <option value="Wednesday"
                                    @if ($batch->day==="Wednesday")
                                    selected  
                                    @endif
                                    
                                    >Wednesday</option>
                                    <option value="Thursday"
                                    @if ($batch->day==="Thursday")
                                    selected  
                                    @endif
                                    
                                    
                                    >Thursday</option>
                                    <option value="Friday"
                                    @if ($batch->day==="Friday")
                                    selected  
                                    @endif
                                    
                                    >Friday</option>
                                    <option value="Saturday"
                                    @if ($batch->day==="Saturday")
                                    selected  
                                    @endif
                                    
                                    >Saturday</option>
                                    <option value="Sunday"
                                    @if ($batch->day==="Sunday")
                                    selected  
                                    @endif
                                    
                                    >Sunday</option>
                                    
          
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label>Start Time</label>
                                  <input type="time" class="form-control" name="start" value="{{$batch->start}}">
                                </div>
                                <div class="form-group">
                                  <label>End Time</label>
                                  <input type="time" class="form-control" name="end" value="{{$batch->end}}">
                                </div>
                                <div class="form-group">
                                  <label>Class Category</label>
                                  <input type="text" class="form-control" name="cat" value="{{$batch->cat}}">
                                </div>
                                <div class="form-group">
                                  <label>Class Fee (LKR) </label>
                                  <input type="number" class="form-control" name="fees" value="{{$batch->fees}}">
                                </div>
                                <div class="form-group">
                                  <label>Teacher Commission (%) </label>
                                  <input type="number" class="form-control" name="teacher_commission" value="{{$batch->teacher_commission}}">
                                </div>
                                
                               
                                
                                  
                                
                                
                                
                              </div>
                              <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                              <div class="card-footer pt-0 text-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
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
    </div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.js') }}"></script>
@endsection