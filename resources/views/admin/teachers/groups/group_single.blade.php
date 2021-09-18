@extends('layouts.admin')
@section('styles')
<title>{{$group->title}}</title>
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
      <div class="btn-group mb-3" role="group" aria-label="Basic example">
        <a href="{{route('admin_teacher_batches',$group->id)}}" class="btn btn-success">Classes</a>
        <a href="{{route('admin_teacher_group_tutorial',$group->id)}}" class="btn btn-info ">Tutorial</a>
        <a href="{{route('admin_teacher_group_video',$group->id)}}" class="btn btn-warning ">Video</a>
        <a href="{{route('admin_teacher_group_mcq',$group->id)}}" class="btn btn-success ">MCQ</a>
        <a href="{{route('admin_teacher_group_essay',$group->id)}}" class="btn btn-info ">Essay</a>
        <a href="{{route('admin_teacher_group_single',$group->id)}}" class="btn btn-primary ">Edit</a>
      </div>
      <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-4">
          <div class="card author-box">
            <div class="card-body">
              <div class="author-box-center">
                <img alt="image" src="{{ asset('storage/app/'.$group->img1) }}" class="author-box-picture">
                <div class="clearfix"></div>
                <div class="author-box-name">
                  <a href="#">{{$group->title}}</a>
                </div>
                <div class="author-box-job"><b>{{$group->user->title}} {{$group->user->f_name}} {{$group->user->l_name}}</b> </div>
                <div class="author-box-job"><b>{{$group->grade->title}}</b> </div>
                
                @if ($group->is_active==1)
                <div class="author-box-job text-success"><b>Active</b> </div>
                @endif
                @if ($group->is_active==0)
                <div class="author-box-job text-warning"><b>Deactive</b> </div>
                @endif
                <div class="text-center">
                    <div class="author-box-description">
                      <p>
                        {!!$group->des1!!}
                      </p>
                    </div>
                    <div class="mb-2 mt-3">
                      @if ($group->is_active==0)
                      <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{route('admin_teacher_group_update',$group->id)}}">
                        @csrf
                        @method('PUT')
                        <input type="text" class="form-control" value="1" name="is_active" hidden>
                        <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                        <button class="btn btn-success">Make Active</button>
                      </form>
                      @endif
                      @if ($group->is_active==1)
                      <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{route('admin_teacher_group_update',$group->id)}}">
                        @csrf
                        @method('PUT')
                        <input type="text" class="form-control" value="0" name="is_active" hidden>
                        <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                        <button class="btn btn-warning">Make Deactive</button>
                      </form>
                      @endif
                     
                      
                    </div>
                    <div class="author-box-job"><b>Updated By: {{$group->author}} <br> {{$group->updated_at->diffForHumans()}}</b> </div>
                  </div>
              </div>
             
            </div>
          </div>
          
          <div class="card">
            <div class="card-header">
              <h4>Classes</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                <li class="media">
                  <div class="media-body">
                    <div class="media-title"><a href="{{route('admin_teacher_batches',$group->id)}}" class="btn btn-primary btn-block text-white">Creat New Class</a></div>
                  </div>
                 
                </li>
                @foreach ($group->g_batches as $batch)
                <li class="media">
                  <div class="media-body">
                    <div class="media-title"><a href="{{route('admin_teacher_batch_single',$batch->id)}}" class="btn btn-success btn-block text-white">{{$batch->title}}</a></div>
                  </div>
                 
                </li>
                @endforeach
               
               
              </ul>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h4>Course Materials</h4>
            </div>
            <div class="card-body">
              <ul class="list-unstyled user-progress list-unstyled-border list-unstyled-noborder">
                <li class="media">
                  <div class="media-body">
                    <div class="media-title"><a href="#" class="btn btn-primary btn-block text-white">Tutorials</a></div>
                  </div>
                 
                </li>
                <li class="media">
                  <div class="media-body">
                    <div class="media-title"><a href="#" class="btn btn-info btn-block text-white">MCQ Papers</a></div>
                  </div>
                 
                </li>
                
               
               
              </ul>
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
                
                  @if ($group->g_batches->count()==0)
                  <div class="alert alert-danger">
                    All the content including course materials and related images will delete permanently from the system and will not be able to recover again. <b>Are you sure?</b>
                  </div>
                      
                      <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{route('admin_teacher_group_delete')}}">
                        @csrf
                        
                        
                        <input type="text" class="form-control" name="id" value="{{$group->id}}" hidden>
                       
                        <button class="btn btn-danger btn-block">Yes, Delete</button>
                      </form>
                  @else
                  <div class="alert alert-warning">
                    This course already conected with classes. Please remove classes from the courses to delete! 
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
                            <form method="POST" enctype="multipart/form-data" action="{{route('admin_teacher_group_update',$group->id)}}">
                                @csrf
                                @method('PUT')
                            <div class="card">
                              <div class="card-header">
                                <h4>Class Details</h4>
                                
                              </div>
                              <div class="card-body pb-0">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$group->title}}">
                                    
                                  </div>
                                <div class="form-group">
                                  <label>Status</label>
                                  <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                      <input type="radio" name="is_active" value="1" class="selectgroup-input-radio"
                                      @if ($group->is_active==1)
                                      checked
                                      @endif
                                      >
                                      <span class="selectgroup-button">Active</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="radio" name="is_active" value="0" class="selectgroup-input-radio" 
                                      @if ($group->is_active==0)
                                      checked
                                      @endif
                                      >
                                      <span class="selectgroup-button">Deactive</span>
                                    </label>
                                   
                                    
                                  </div>
                                </div>
                                <div class="form-group">
                                 
                                  @if ($group->img1)
                                  <img alt="image" src="{{ asset('storage/app/'.$group->img1) }}" class="img-fluid">
                                  @else
                                     Not Asign Yet 
                                  @endif
                                    
                                </div>
                                <div class="form-group">
                                    <label>Front Image 370x240</label>
                                    <input type="file" class="form-control" id="img1" name="img1">   
                                </div>
                                <div class="form-group">
                                    <label>Thumbnail Description (Small)</label>
                                    <textarea maxlength="250" class="summernote-simple" name="des1">{{$group->des1}}</textarea>
                                </div>
                                <div class="form-group">
                                 
                                    @if ($group->img2)
                                    <img alt="image" src="{{ asset('storage/app/'.$group->img2) }}" class="img-fluid">
                                    @else
                                       Not Asign Yet 
                                    @endif
                                      
                                  </div>
                                  <div class="form-group">
                                      <label>Detail Image 770x370</label>
                                      <input type="file" class="form-control" id="img2" name="img2">   
                                  </div>
                                  <div class="form-group">
                                    <label>Main Description</label>
                                    <textarea  class="summernote-simple" name="des2">{{$group->des2}}</textarea>
                                  </div>
                                
                                <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                                
                              </div>
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