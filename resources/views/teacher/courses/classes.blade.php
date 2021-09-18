@extends('layouts.teacher')
@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>{{$group->user->title}} {{$group->user->f_name}} | {{$group->grade->title}} | {{$group->title}} | All Classes</h4>
          
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


@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/advance-table.js') }}"></script>

@endsection