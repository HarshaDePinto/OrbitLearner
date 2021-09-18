@extends('layouts.admin')

@section('styles')
<title>{{$group->title}} | All MCQ Papers</title>
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
                    <h4>All MCQ Papers</h4>
                    <div class="card-header-action">
                      <div class="input-btn">
                        <a href="#creatNew" class="btn btn-success">Add A New Tutorial </a >
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
                              <th>Number</th>
                              <th>Title</th>
                              <th>Time(min)</th>
                              <th>Status</th>
                              <th>View</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($mcqs as $mcq)
                              <tr>
                              <th class="text-center">
                                  <i class="fas fa-th"></i>
                              </th>
                              <td>
                                  {{$mcq->number}}
                              </td>
  
                              <td>
                                {{$mcq->title}}
                                <div class="text-success text-small font-600-bold">Updated By {{$mcq->author}} <br>On {{date('d-M-Y', strtotime($mcq->updated_at))}}</div>
                              </td>
                              <td>
                                  {{$mcq->time}}
                                </td>
                                <td>
                                    @if ($mcq->is_active==1)
                                    <div class="badge badge-success">Active</div>
                                    
                                    @else
                                    <div class="badge badge-warning">Deactive</div>
                                  
                                    @endif
                                  
                                </td>
                                <td><a href="{{route('admin_teacher_group_mcq_s',$mcq->id)}}" class="btn btn-primary">Detail</a></td>
                              </tr>
                              @endforeach
                            
                            
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
          
        </div>
       
      </div>
    </div>
</section>

    <section class="section" id="creatNew">
        <div class="section-body">
            

          <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Add A MCQ Paper</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('admin_create_group_mcq')}}">
                        @csrf
                        <input type="text" class="form-control" name="group_id" value="{{$group->id}}" hidden >
                        <input type="text" class="form-control" name="is_active" value="1" hidden >
                        <div class="row">
                            <div class="form-group col-md-2 col-12">
                                <label>Paper Number</label>
                                <input type="number" class="form-control" name="number" required >
                                
                            </div>

                            <div class="form-group col-md-4 col-12">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" required>
                                
                            </div>

                            <div class="form-group col-md-2 col-12">
                                <label>Time (Minutes)</label>
                                <input type="number" class="form-control" name="time" required>
                                
                            </div>
                            <div class="form-group col-md-4 col-12">
                                <label>Type</label>
                                <div class="selectgroup w-100">
                                  <label class="selectgroup-item">
                                    <input type="radio" name="type" value="0" class="selectgroup-input-radio"
                                    >
                                    <span class="selectgroup-button">4 ANS</span>
                                  </label>
                                  <label class="selectgroup-item">
                                    <input type="radio" name="type" value="1" class="selectgroup-input-radio" 
                                    
                                    >
                                    <span class="selectgroup-button">5 ANS</span>
                                  </label>
                                 
                                  
                                </div>
                            </div>
                            
                            
                        </div>
                        <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                        <div class="card-footer pt-0 text-right">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                    
                </div>
              </div>
              
            </div>
           
          </div>
        </div>
    </section>
    
    
    
@endsection

@section('scripts')

@endsection