@extends('layouts.admin')
@section('styles')
<title>{{$batch->group->title}}</title>
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
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="padding-20">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              
              <li class="nav-item active">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#MCQ" role="tab"
                  aria-selected="false">MCQ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#MCQAdd" role="tab"
                  aria-selected="false">Add A MCQ</a>
              </li>
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              
              <div class="tab-pane fade show active" id="MCQ" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="row">
                  <div class="col-md-12">
                      
                      <div class="card">
                        <div class="card-header">
                          <h4>MCQ Papers </h4>
                        </div>
                        <div class="card-body p-0">
                         
                          <div class="table-responsive">
                            <table class="table table-striped table-md">
                              <tbody>
                                  <tr>
                      
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Remove</th>
                                    <th>Results</th>
                                  </tr>
                                  @if ($batch->b_mcqs->count()!=0)
                                    @foreach ($batch->b_mcqs as $mcq)
                                      <tr>
                                        <td>
                                            <a href="{{route('admin_teacher_group_mcq_s',$mcq->g_mcq->id)}}" target="_blank">{{$mcq->g_mcq->title}}</a>
                                            <div class="text-success text-small font-600-bold">Updated By {{$mcq->author}} <br>On {{date('d-M-Y', strtotime($mcq->updated_at))}}</div>
                                            
                                        </td>
                                        <td>
                                            @if ($mcq->is_active==1)
                                            <div class="badge badge-success">Active</div>
                                            
                                            @else
                                            <div class="badge badge-warning">Deactive</div>
                                           
                                            @endif
                                        </td>
                                        <td>
                                          @if ($mcq->is_active==1)
                                          <a href="{{route('admin_teacher_batch_mcq_status',$mcq->id)}}" class="btn btn-sm btn-warning">Make Deactive</a>
                                          
                                          
                                          @else
                                          <a href="{{route('admin_teacher_batch_mcq_status',$mcq->id)}}" class="btn btn-sm btn-success">Make Active</a>
                                          
                                         
                                          @endif
                                        </td>
                                        
                                        <td><a href="{{route('admin_teacher_batch_mcq_delete',$mcq->id)}}" class="btn btn-sm btn-danger">Remove</a></td>
                                        <td>
                                          @if ($mcq->m_marks->count()!=0)
                                          <a href="{{route('admin_b_mcq_result',$mcq->id)}}" class="btn btn-sm btn-info" target="_blank">Results</a>
                                          @endif
                                        </td>
                                      </tr>
                                    @endforeach
                                  @endif
                                 
                                  
                              </tbody>
                            </table>
                          </div>
                        </div>
                        
                      </div>
                     
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="MCQAdd" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="row">
                  <div class="col-md-12">
                    
                      <form method="POST" enctype="multipart/form-data" action="{{route('admin_teacher_batch_m_add')}}">
                        @csrf
                        
                      
                      <div class="card">
                        <div class="card-header">
                          <h4>Add A MCQ Paper</h4>
                        </div>
                        <div class="card-body pb-0">
                          <div class="row">
                            
                          
                            <div class="form-group col-md-8 col-12">
                              <label>Paper</label>
                          <select class="form-control" name="g_mcq_id">
                            @foreach ($batch->group->g_mcqs->where('is_active',1) as $mcq)
                            @if ($mcq->b_mcqs->where('g_batch_id',$batch->id)->count()==0)
                            <option value="{{$mcq->id}}">{{$mcq->title}}</option>
                            @endif
                            
                            @endforeach
                            
                           
                          </select>
                              
                            </div>
                            <input type="text" class="form-control" name="group_id" value="{{$batch->group_id}}" hidden >
                            <input type="text" class="form-control" name="g_batch_id" value="{{$batch->id}}" hidden >
                            <input type="text" class="form-control" name="is_active" value="1" hidden >
                          </div>
                        </div>
                        <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                        <div class="card-footer pt-0 text-right">
                          <button type="submit" class="btn btn-primary">Add</button>
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