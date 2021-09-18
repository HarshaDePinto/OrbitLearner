
@extends('layouts.admin')

@section('styles')
<title>{{$group->title}} | All Essays</title>
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
            <a href="{{route('admin_teacher_group_single',$group->id)}}"><h5>{{$group->user->title}} {{$group->user->f_name}} {{$group->user->l_name}} | {{$group->grade->title}} | {{$group->title}}</h5></a>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                
                <div class="card-body">
                    
                    <div class="card-header">
                        <h4>All Essays</h4>
                        <div class="card-header-action">
                          <div class="input-btn">
                            <a href="#creatNew" class="btn btn-success">Add A New Essay </a >
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-0">
                          
                        <h2 class="text-danger">Under Construction</h2>
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