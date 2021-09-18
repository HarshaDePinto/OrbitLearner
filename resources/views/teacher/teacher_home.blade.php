@extends('layouts.teacher')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        @if ($teacher->image)
                        <img alt="image" src="{{ asset('storage/app/'.$teacher->image) }}" class="rounded-circle profile-widget-picture">  
                        @else
                        @if ($teacher->gender==1)
                        <img alt="image" src="{{ asset('public/back/assets/img/admin.jpg') }}" class="rounded-circle profile-widget-picture">
                        @endif
                        @if ($teacher->gender==2)
                        <img alt="image" src="{{ asset('public/back/assets/img/adminf.jpg') }}" class="rounded-circle profile-widget-picture">
                        @endif
                    
                    
                        @endif
                    
                
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Name</div>
                                <div class="profile-widget-item-value">{{$teacher->title}} {{$teacher->f_name}}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Reg: No</div>
                                <div class="profile-widget-item-value">{{$teacher->user_name}}</div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Gender</div>
                                <div class="profile-widget-item-value">
                                    @if ($teacher->gender==1)
                                    Male
                                    @endif
                                    @if ($teacher->gender==2)
                                        Female
                                    @endif
                                </div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Birthday</div>
                                <div class="profile-widget-item-value">
                                    @if ($teacher->birthday)
                                    {{$teacher->birthday}}
                                    @else
                                        **Please Fill
                                    @endif
                                    
                                </div>
                            </div>
                            

                        
                        </div>
                        <a href="{{route('teacher_profile',$teacher->id)}}" class="btn btn-primary btn-sm btn-block">My Profile</a>
                       
                         
                        
                    </div>
                </div>
                
                
            
            
            </div>
            
         
            <div class="col-12 col-sm-12 col-lg-6">
                
                <div class="card">
                    <div class="card-header">
                    <h4 class="text-info">Announcement </h4>
                    </div>
                    <div class="card-body">
                    
                    </div>
                </div>
                
            </div>
            
            
            
        </div>
        <div class="row">
       
            <div class="col-12 col-md-12 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4>Today Classes</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped table-md">
                      <tbody>
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
                        @foreach ($teacher->g_batches->where('day',now()->format('l')) as $clz)
                       
                            
                        
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
                      
                      
                    </tbody></table>
                  </div>
                </div>
                <div class="card-footer text-right">
                  
                </div>
              </div>
            </div>
        </div>
        
    </div>
</section>
@endsection