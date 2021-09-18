@extends('layouts.admin')
@section('styles')
<title>{{$group->user->title}} {{$group->user->f_name}} | {{$group->grade->title}} | {{$group->title}} | All Batches</title>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>{{$group->user->title}} {{$group->user->f_name}} | {{$group->grade->title}} | {{$group->title}} | All Classes</h4>
          <div class="card-header-action">
            
              <div class="input-group">
              
                <div class="input-btn">
                   <a href="#addGrade" class="btn btn-sm btn-success">Add A Batch</a>
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
                  <th>Online</th>
                  <th>Students</th>
                  <th>Tutorial</th>
                  <th>Video</th>
                  <th>MCQ</th>
                  <th>Eassay</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($group->g_batches as $clz)
                <tr>
                  <td>
                    <div class="sort-handler">
                      <i class="fas fa-th"></i>
                    </div>
                  </td>
                  <td>
                    <a href="{{route('admin_teacher_batch_single',$clz->id)}}">{{$clz->year}} {{$clz->title}}</a>
                    
                    <div class=" text-small font-600-bold">
                      <span class="text-info">{{$clz->grade->title}}</span> |
                      <span class="text-dark">{{$clz->subject->title}}</span> | 
                      
                      <span class="text-success">{{$clz->group->title}}</span>
                      
                     
                      
                     
                      
                      
                    </div>
                  </td>
                  <td><a href="{{route('admin_teacher_batch_online',$clz->id)}}" class="btn btn-success btn-sm">Online</a></td>
                  <td><a href="{{route('admin_teacher_batch_students',$clz->id)}}" class="btn btn-primary btn-sm">Students</a></td>
                  <td><a href="{{route('admin_teacher_batch_tutorial',$clz->id)}}" class="btn btn-info btn-sm">Tutorial</a></td>
                  <td><a href="{{route('admin_teacher_batch_video',$clz->id)}}" class="btn btn-warning btn-sm">Video</a></td>
                  <td><a href="{{route('admin_teacher_batch_mcq',$clz->id)}}" class="btn btn-success btn-sm">MCQ</a></td>
                  <td><a href="{{route('admin_teacher_batch_essay',$clz->id)}}" class="btn btn-info btn-sm">Essay</a></td>
                  <td><a href="{{route('admin_teacher_batch_single',$clz->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  
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
            <h4>Add A Class</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin_teacher_batch')}}">
                    @csrf
                    <div class="form-group">
                        <label>Batch Year</label>
                        <input type="text" class="form-control" name="year" required>
                    </div>
                    <div class="form-group">
                        <label>Class Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Pay Type</label>
                        <select class="form-control" name="type" required>
   
                            <option value="1">Paid</option>
                            <option value="0">Free</option>

                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label>Class Day</label>
                        <select class="form-control" name="day" required>
   
                         
                          <option value="Monday">Monday</option>
                          <option value="Tuesday">Tuesday</option>
                          <option value="Wednesday">Wednesday</option>
                          <option value="Thursday">Thursday</option>
                          <option value="Friday">Friday</option>
                          <option value="Saturday">Saturday</option>
                          <option value="Sunday">Sunday</option>
                          

                      </select>
                    </div>
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="time" class="form-control" name="start" required>
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" class="form-control" name="end" required>
                    </div>
                    <div class="form-group">
                        <label>Class Category</label>
                        <input type="text" class="form-control" name="cat" required>
                    </div>
                    <div class="form-group">
                        <label>Class Fee (LKR)</label>
                        <input type="number" class="form-control" name="fees" required>
                    </div>
                    <div class="form-group">
                      <label>Teacher Commission (%)</label>
                      <input type="number" class="form-control" name="teacher_commission" required>
                  </div>
                    <input type="text" class="form-control" name="user_id" value="{{$group->user_id}}" hidden >
                    <input type="text" class="form-control" name="subject_id" value="{{$group->subject_id}}" hidden >
                    <input type="text" class="form-control" name="grade_id" value="{{$group->grade_id}}" hidden >
                    <input type="text" class="form-control" name="group_id" value="{{$group->id}}" hidden >
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

@endsection