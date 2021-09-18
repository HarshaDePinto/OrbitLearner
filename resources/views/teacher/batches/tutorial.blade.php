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
                  aria-selected="false">Tutorials</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#addTutorials" role="tab"
                  aria-selected="false">Add A Tutorials</a>
              </li>
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
             
              <div class="tab-pane fade show active" id="Tutorials" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="row">
                  <div class="col-md-12">
                      
                      <div class="card">
                        <div class="card-header">
                          <h4>Tutorials </h4>
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
                                    
                                  </tr>
                                  @if ($batch->b_tutorials->count()!=0)
                                    @foreach ($batch->b_tutorials as $tut)
                                      <tr>
                                        <td>
                                            <a target="_blank" href="{{route('teacher_c_tutorial_s',$tut->g_tutorial->id)}}">{{$tut->g_tutorial->title}}</a>
                                            
                                            <div class="text-success text-small font-600-bold">Updated By {{$tut->author}} <br>On {{date('d-M-Y', strtotime($tut->updated_at))}}</div>
                                        </td>
                                        <td>
                                          @if ($tut->is_active==1)
                                          <div class="badge badge-success">Active</div>
                                          
                                          @else
                                          <div class="badge badge-warning">Deactive</div>
                                         
                                          @endif
                                        </td>
                                        <td>
                                          @if ($tut->is_active==1)
                                          <a href="{{route('admin_teacher_batch_tutorial_status',$tut->id)}}" class="btn btn-sm btn-warning">Make Deactive</a>
                                          
                                          
                                          @else
                                          <a href="{{route('admin_teacher_batch_tutorial_status',$tut->id)}}" class="btn btn-sm btn-success">Make Active</a>
                                          
                                         
                                          @endif
                                        </td>
                                        
                                        <td><a href="{{route('admin_teacher_batch_tutorial_delete',$tut->id)}}" class="btn btn-sm btn-danger">Remove</a></td>
                                        
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
              <div class="tab-pane fade" id="addTutorials" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="row">
                  <div class="col-md-12">
                   
                      <form method="POST" enctype="multipart/form-data" action="{{route('admin_teacher_batch_t_add')}}">
                        @csrf
                        
                      
                      <div class="card">
                        <div class="card-header">
                          <h4>Add A Tutorial</h4>
                        </div>
                        <div class="card-body pb-0">
                          <div class="row">
                            
                          
                            <div class="form-group col-md-8 col-12">
                              <label>Tutorial</label>
                          <select class="form-control" name="g_tutorial_id">
                            @foreach ($batch->group->g_tutorials->where('is_active',1) as $tut)
                            @if ($tut->b_tutorials->where('g_batch_id',$batch->id)->count()==0)
                            <option value="{{$tut->id}}">{{$tut->title}}</option>
                            @endif
                            
                            @endforeach
                            
                           
                          </select>
                              
                            </div>
                            <input type="text" class="form-control" name="group_id" value="{{$batch->group_id}}" hidden >
                            <input type="text" class="form-control" name="g_batch_id" value="{{$batch->id}}" hidden >
                            <input type="text" class="form-control" name="is_active" value="1" hidden >
                            <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                          </div>
                        </div>
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

@endsection