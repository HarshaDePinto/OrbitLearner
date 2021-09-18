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
                <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#Tutorials" role="tab"
                  aria-selected="false">Essay</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#addTutorials" role="tab"
                  aria-selected="false">Add A Essay</a>
              </li>
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
             
              <div class="tab-pane fade show active" id="Tutorials" role="tabpanel" aria-labelledby="profile-tab2">
                <h2 class="text-danger">Under Construction</h2>
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