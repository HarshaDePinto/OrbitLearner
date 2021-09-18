@extends('layouts.student')
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        @if ($student->image)
                        <img alt="image" src="{{ asset('storage/app/'.$student->image) }}" class="rounded-circle profile-widget-picture">  
                        @else
                        @if ($student->gender==1)
                        <img alt="image" src="{{ asset('public/back/assets/img/student.jpg') }}" class="rounded-circle profile-widget-picture">
                        @endif
                        @if ($student->gender==2)
                        <img alt="image" src="{{ asset('public/back/assets/img/studentf.jpg') }}" class="rounded-circle profile-widget-picture">
                        @endif
                    
                    
                        @endif
                    
                
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Name</div>
                                <div class="profile-widget-item-value">{{$student->title}} {{$student->f_name}}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Reg: No</div>
                                <div class="profile-widget-item-value">{{$student->user_name}}</div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Gender</div>
                                <div class="profile-widget-item-value">
                                    @if ($student->gender==1)
                                    Male
                                    @endif
                                    @if ($student->gender==2)
                                        Female
                                    @endif
                                </div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Birthday</div>
                                <div class="profile-widget-item-value">
                                    @if ($student->birthday)
                                    {{$student->birthday}}
                                    @else
                                        **Please Fill
                                    @endif
                                    
                                </div>
                            </div>
                            

                        
                        </div>
                        <a href="{{route('student_profile',$student->id)}}" class="btn btn-primary btn-sm btn-block">My Profile</a>
                       
                         
                        
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
                            <th>#</th>
                            <th>Teacher</th>
                            <th>Class</th>
                            <th>Time</th>
                            <th>Visit</th>
                        </tr>
                        @foreach ($student->b_students as $clz)
                        @if ($clz->g_batch->day==now()->format('l'))
                            
                        
                        <tr>
                            
                                <td>
                                    <div class="sort-handler">
                                      @if ($clz->g_batch->group->user->image)
                                      <img alt="image" class="rounded-circle" width="35"
                                        data-toggle="tooltip" title="{{$clz->g_batch->group->user->title}} {{$clz->g_batch->group->user->f_name}}" src="{{ asset('storage/app/'.$clz->g_batch->group->user->image) }}">
                                          
                                          
                                          @else
                                          @if ($clz->g_batch->group->user->gender==1)
                                          <img alt="image" class="rounded-circle" width="35"
                                        data-toggle="tooltip" title="{{$clz->g_batch->group->user->title}} {{$clz->g_batch->group->user->f_name}}" src="{{ asset('public/back/assets/img/admin.png') }}">
                                          
                                          
                                          @endif
                                          @if ($clz->g_batch->group->user->gender==2)
                                          <img alt="image" class="rounded-circle" width="35"
                                        data-toggle="tooltip" title="{{$clz->g_batch->group->user->title}} {{$clz->g_batch->group->user->f_name}}" src="{{ asset('public/back/assets/img/adminf.png') }}">
                                          @endif
                                          @endif
                                      
                                    </div>
                                </td>
                            
                            <td>
                                {{$clz->g_batch->group->user->title}} {{$clz->g_batch->group->user->f_name}} {{$clz->g_batch->group->user->l_name}}
                            </td>
                            <td>
                                  {{$clz->g_batch->group->title}} | {{$clz->g_batch->year}} |{{$clz->g_batch->title}}
                                <div class=" text-small font-600-bold">
                                    <span class="text-info"> {{$clz->g_batch->grade->title}}</span> | 
                                    <span class="text-success">{{$clz->g_batch->subject->title}}</span>
                                    
                                </div>
                            </td>
                            <td>
                                {{$clz->g_batch->day}}
                                <div class=" text-small font-600-bold">
                                    From
                                    <span class="text-info"> {{$clz->g_batch->start}}</span> to 
                                    <span class="text-info">{{$clz->g_batch->end}}</span>
                                    
                                </div>
                            </td>
                            <td>
                                <form method="POST" enctype="multipart/form-data" action="{{route('student_single_class')}}">
                                    @csrf
                                    
                                   
                                    <input type="text" class="form-control" name="b_student_id" value="{{$clz->id}}" hidden>
                                    
                                    <button class="btn btn-primary btn-sm">Visit</button>
          
                                </form>
                            </td>
                        </tr>
                        @endif
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