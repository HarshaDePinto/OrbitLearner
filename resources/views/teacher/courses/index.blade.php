@extends('layouts.teacher')
@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>{{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}} Courses</h4>
          <div class="card-header-action">
            
              
            
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
                    <a href="{{route('teacher_c_single',$group->id)}}">{{$group->title}}</a>
                    
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
                  
                  <td><a href="{{route('teacher_c_classes',$group->id)}}" class="btn btn-primary btn-sm">Classes</a></td>
                  <td><a href="{{route('teacher_c_tutorial',$group->id)}}" class="btn btn-info btn-sm">Tutorial</a></td>
                  <td><a href="{{route('teacher_c_video',$group->id)}}" class="btn btn-warning btn-sm">Video</a></td>
                  <td><a href="{{route('teacher_c_mcq',$group->id)}}" class="btn btn-success btn-sm">MCQ</a></td>
                  <td><a href="{{route('teacher_c_essay',$group->id)}}" class="btn btn-info btn-sm">Eassay</a></td>
                  <td><a href="{{route('teacher_c_single',$group->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  
                </tr>
                @endforeach
                
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/advance-table.js') }}"></script>

@endsection