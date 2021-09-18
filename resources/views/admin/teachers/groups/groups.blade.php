
@extends('layouts.admin')
@section('styles')
<title>{{$teacher->title}} {{$teacher->f_name}} Courses</title>
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.css') }}">
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>{{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}} Courses</h4>
          <div class="card-header-action">
            
              <div class="input-group">
              
                <div class="input-btn">
                   <a href="#addGrade" class="btn btn-sm btn-success">Add A Course</a>
                </div>
                
              </div>
            
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped" id="sortable-table">
              <thead>
                <tr>
                  <th class="text-center">
                    <i class="fas fa-th"></i>
                  </th>
                  <th>Title</th>
                  <th>Classes</th>
                  <th>Tutorial</th>
                  <th>Video</th>
                  <th>MCQ</th>
                  <th>Eassay</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($teacher->groups as $group)
                <tr>
                  <td>
                    <div class="sort-handler">
                      <i class="fas fa-th"></i>
                    </div>
                  </td>
                  <td>
                    <a href="{{route('admin_teacher_group_single',$group->id)}}">{{$group->title}}</a>
                    
                    <div class=" text-small font-600-bold">
                      <span class="text-info">{{$group->grade->title}}</span> |
                      <span class="text-dark">{{$group->subject->title}}</span> | 
                      @if ($group->is_active==1)
                      <span class="text-success">Active</span>
                      
                      @else
                      <span class="text-warning">Deactive</span>
                      
                     
                      @endif
                      
                    </div>
                  </td>
                  
                  <td><a href="{{route('admin_teacher_batches',$group->id)}}" class="btn btn-primary btn-sm">Classes</a></td>
                  <td><a href="{{route('admin_teacher_group_tutorial',$group->id)}}" class="btn btn-info btn-sm">Tutorial</a></td>
                  <td><a href="{{route('admin_teacher_group_video',$group->id)}}" class="btn btn-warning btn-sm">Video</a></td>
                  <td><a href="{{route('admin_teacher_group_mcq',$group->id)}}" class="btn btn-success btn-sm">MCQ</a></td>
                  <td><a href="{{route('admin_teacher_group_essay',$group->id)}}" class="btn btn-info btn-sm">Eassay</a></td>
                  <td><a href="{{route('admin_teacher_group_single',$group->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  
                </tr>
                @endforeach
                
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row" id="addGrade">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            
            <div class="card-header">
            <h4>Add A Course To {{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin_teacher_group')}}">
                    @csrf
                    <div class="form-group">
                        <label>Course Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>

                    <div class="form-group">
                        <label>Grade</label>
                        <select class="form-control" name="grade_id" required>
                            @foreach ($grades as $grade)
                            
                            <option value="{{$grade->id}}">{{$grade->title}}</option>
                            
                            
                            @endforeach
                        
                        
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <select class="form-control" name="subject_id" required>
                            @foreach ($subjects as $subject)
                            
                            <option value="{{$subject->id}}">{{$subject->title}}</option>
                            
                            
                            @endforeach
                        
                        
                        </select>
                        
                    </div>
                    <div class="form-group">
                      <label>Thumbnail Description (Small)</label>
                      <textarea maxlength="250" class="summernote-simple" name="des1"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Main Description</label>
                      <textarea  class="summernote-simple" name="des2"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Front Image 370x240</label>
                      <input type="file" class="form-control" id="img1" name="img1" required>   
                    </div>
                    <div class="form-group">
                      <label>Detail Image 770x370</label>
                      <input type="file" class="form-control" id="img2" name="img2" required>   
                    </div>

                    <input type="text" class="form-control" name="user_id" value="{{$teacher->id}}" hidden >
                    <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            
            </div>
        </div>
       
     
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/advance-table.js') }}"></script>
<script src="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.js') }}"></script>

@endsection