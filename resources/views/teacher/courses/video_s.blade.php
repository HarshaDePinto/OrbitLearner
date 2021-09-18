@extends('layouts.teacher')

@section('styles')

@endsection

@section('content')
<a href="#"><h5>{{$video->title}}</h5></a>
<div class="text-dark text-small font-600-bold"><b>Updated By: {{$video->author}} <br> {{$video->updated_at->diffForHumans()}}</b></div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{route('admin_update_group_video',$video->id)}}">
                @csrf
                @method('PUT')
                <input type="text" class="form-control" name="group_id" value="{{$video->group_id}}" hidden >
                
                <div class="row">
                    <div class="form-group col-md-12 col-12">
                        <label>Status</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="is_active" value="1" class="selectgroup-input-radio"
                            @if ($video->is_active==1)
                            checked
                            @endif
                            >
                            <span class="selectgroup-button">Active</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="is_active" value="0" class="selectgroup-input-radio" 
                            @if ($video->is_active==0)
                            checked
                            @endif
                            >
                            <span class="selectgroup-button">Deactive</span>
                          </label>
                         
                          
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{$video->title}}">
                        
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Link</label>
                        <input type="text" class="form-control" name="vid" value="{{$video->vid}}" >
                        
                    </div>
                    
                </div>
                <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                <div class="card-footer pt-0 text-right">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
            <div class="card-footer pt-0 text-left">
                <form method="POST" enctype="multipart/form-data" action="{{route('teacher_c_video_d')}}">
                    <input type="text" name="id" value="{{$video->id}}" hidden>
                    @csrf
                    <button type="submit" class="btn btn-danger text-white">Delete</button>
                </form>
            </div>
            
        </div>
      </div>
      
    </div>
   
</div>
<section class="section">
    <div class="section-body">

        <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="{{$video->vid}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
      
    </div>
</section>
    
    
    
@endsection

@section('scripts')

@endsection