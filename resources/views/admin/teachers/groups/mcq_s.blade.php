@extends('layouts.admin')
@section('styles')
<title>{{$mcq->group->title}} | {{$mcq->number}}. {{$mcq->title}}</title>
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.css') }}">

@endsection



@section('content')
<section class="section">
  <div class="section-body">
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-4">
        <div class="card author-box">
          <div class="card-body">
            <div class="author-box-center">
              <img alt="image" src="{{ asset('storage/app/'.$mcq->group->img1) }}" class="author-box-picture">
              <div class="clearfix"></div>
              <div class="author-box-name">
                <a href="#">{{$mcq->group->title}}</a>
              </div>
              <div class="author-box-job"><b>{{$mcq->number}}. {{$mcq->title}}</b> </div>
              @if ($mcq->is_active==1)
              <div class="author-box-job text-success"><b>Active</b> </div>
              @endif
              @if ($mcq->is_active==0)
              <div class="author-box-job text-warning"><b>Deactive</b> </div>
              @endif
            </div>
            <div class="text-center">
              
              <div class="mb-2 mt-3">
                @if ($mcq->is_active==0)
                <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{route('admin_update_group_mcq',$mcq->id)}}">
                  @csrf
                  @method('PUT')
                  <input type="text" class="form-control" value="1" name="is_active" hidden>
                  <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                  <button class="btn btn-success">Make Active</button>
                </form>
                @endif
                @if ($mcq->is_active==1)
                <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{route('admin_update_group_mcq',$mcq->id)}}">
                  @csrf
                  @method('PUT')
                  <input type="text" class="form-control" value="0" name="is_active" hidden>
                  <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                  <button class="btn btn-warning">Make Deactive</button>
                </form>
                @endif
                
              </div>
              <div class="author-box-job"><b>Updated By: {{$mcq->author}} <br> {{$mcq->updated_at->diffForHumans()}}</b></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <button class="btn btn-danger btn-sm btn-block" type="button" data-toggle="collapse"
                data-target="#mcqDelete" aria-expanded="false" aria-controls="mcqDelete">
                Delete
              </button>
          </div>
          <div class="card-body">
            
            <div class="collapse" id="mcqDelete">
              
                @if ($mcq->m_questions->count()==0)
                <div class="alert alert-danger">
                  All the content including MCQ questions, results, and related images will delete permanently from the system and will not be able to recover again. <b>Are you sure?</b>
                </div>
                    
                    <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{route('admin_delete_group_mcq')}}">
                      @csrf
                      
                      
                      <input type="text" class="form-control" name="id" value="{{$mcq->id}}" hidden>
                     
                      <button class="btn btn-danger btn-block">Yes, Delete</button>
                    </form>
                @else
                <div class="alert alert-warning">
                  You Already added questions under this paper, you should delete them first, before deleting the paper!
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
                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#Questions" role="tab"
                  aria-selected="true">Questions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#Answers" role="tab"
                  aria-selected="false">Answers</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#Add" role="tab"
                  aria-selected="false">Add Questions</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#Edit" role="tab"
                  aria-selected="false">Edit</a>
              </li>
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
                <div class="tab-pane fade show active" id="Questions" role="tabpanel" aria-labelledby="home-tab2">
                    @foreach ($mcq->m_questions as $mqu)
                    <div class="card">
                     
                        <div class="card-header">
                          <h4>Question {{$mqu->number}}</h4>
                          <div class="card-header-action">
                            <a href="{{route('admin_delete_group_mqu',$mqu->id)}}" class="btn btn-danger">Remove</a>
                          </div>
                        </div>
                        <div class="card-body">
                          
                         
                                <img alt="image" src="{{ asset('storage/app/'.$mqu->q_img) }}" class="img-fluid">
                           
                                <div class="mb-2 text-dark text-left">
                                  Added By {{$mqu->author}} | On {{date('d-M-Y', strtotime($mqu->created_at))}}
                                   
                                </div>
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
                    </div>
                    @endforeach
                    
                    
                </div>
                <div class="tab-pane fade" id="Answers" role="tabpanel" aria-labelledby="profile-tab2">
                    @foreach ($mcq->m_questions as $mqu)
                    <div class="card">
                     
                        <div class="card-header">
                          <h4>Question {{$mqu->number}}</h4>
                          
                          <div class="card-header-action">
                            <a href="{{route('admin_delete_group_mqu',$mqu->id)}}" class="btn btn-danger">Remove</a>
                          </div>
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
                <div class="tab-pane fade" id="Add" role="tabpanel" aria-labelledby="profile-tab2">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route('admin_create_group_mqu')}}">
                            @csrf
                            
                            <input type="text" class="form-control" name="g_mcq_id" value="{{$mcq->id}}" hidden >
                            
                            <div class="row">
                               
                                <div class="form-group col-md-4 col-12">
                                    <label>Question Number</label>
                                    <input type="number" class="form-control" name="number" required>
                                    
                                </div>
    
                                <div class="form-group col-md-4 col-12">
                                    <label>Marks</label>
                                    <input type="number" class="form-control" name="marks" required>
                                    
                                </div>
    
                                <div class="form-group col-md-4 col-12">
                                    <label>Question Image</label>
                                    <input type="file" class="form-control" name="q_img" required>
                                    
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label class="form-label">Answer</label>
                                    <div class="selectgroup w-100">
                                      <label class="selectgroup-item">
                                        <input type="radio" name="ans" value="1" class="selectgroup-input-radio" required >
                                        <span class="selectgroup-button">1</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="ans" value="2" class="selectgroup-input-radio">
                                        <span class="selectgroup-button">2</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="ans" value="3" class="selectgroup-input-radio">
                                        <span class="selectgroup-button">3</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="ans" value="4" class="selectgroup-input-radio">
                                        <span class="selectgroup-button">4</span>
                                      </label>
                                      @if ($mcq->type==1)
                                      <label class="selectgroup-item">
                                        <input type="radio" name="ans" value="5" class="selectgroup-input-radio">
                                        <span class="selectgroup-button">5</span>
                                      </label>
                                      @endif
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Answer Image</label>
                                    <input type="file" class="form-control" name="s_img" >
                                    
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Answer Audio</label>
                                    <input type="file" class="form-control" name="s_audio" >
                                    
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Answer Video Link</label>
                                    <input type="text" class="form-control" name="s_vid" >
                                    
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Answer Explain</label>
                                    <textarea class="summernote-simple" name="s_des"></textarea>
                                  </div>
                                
                            </div>
                            <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                            <div class="card-footer pt-0 text-right">
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="tab-pane fade" id="Edit" role="tabpanel" aria-labelledby="profile-tab2">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{route('admin_update_group_mcq',$mcq->id)}}">
                            @csrf
                            @method('PUT')
                            <input type="text" class="form-control" name="course_id" value="{{$mcq->course_id}}" hidden >
                            
                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Status</label>
                                    <div class="selectgroup w-100">
                                      <label class="selectgroup-item">
                                        <input type="radio" name="is_active" value="1" class="selectgroup-input-radio"
                                        @if ($mcq->is_active==1)
                                        checked
                                        @endif
                                        >
                                        <span class="selectgroup-button">Active</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="is_active" value="0" class="selectgroup-input-radio" 
                                        @if ($mcq->is_active==0)
                                        checked
                                        @endif
                                        >
                                        <span class="selectgroup-button">Deactive</span>
                                      </label>
                                     
                                      
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Type</label>
                                    <div class="selectgroup w-100">
                                      <label class="selectgroup-item">
                                        <input type="radio" name="type" value="0" class="selectgroup-input-radio"
                                        @if ($mcq->type==0)
                                        checked
                                        @endif
                                        >
                                        <span class="selectgroup-button">4 ANS</span>
                                      </label>
                                      <label class="selectgroup-item">
                                        <input type="radio" name="type" value="1" class="selectgroup-input-radio" 
                                        @if ($mcq->type==1)
                                        checked
                                        @endif
                                        >
                                        <span class="selectgroup-button">5 ANS</span>
                                      </label>
                                     
                                      
                                    </div>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Paper Number</label>
                                    <input type="text" class="form-control" name="number" value="{{$mcq->number}}" >
                                    
                                </div>
    
                                <div class="form-group col-md-4 col-12">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$mcq->title}}">
                                    
                                </div>
    
                                <div class="form-group col-md-4 col-12">
                                    <label>Time (Minutes)</label>
                                    <input type="text" class="form-control" name="time" value="{{$mcq->time}}">
                                    
                                </div>
                                
                                
                            </div>
                            <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                            <div class="card-footer pt-0 text-right">
                                <button type="submit" class="btn btn-success">Update</button>
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
<script src="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.js') }}"></script>

@endsection