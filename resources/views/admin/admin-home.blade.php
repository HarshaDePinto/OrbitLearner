@extends('layouts.admin')
@section('styles')
<title>Admin Panel</title>
@endsection
@section('search')
<li>
  <form class="form-inline mr-auto" method="POST" action="{{route('user_search')}}">
    @csrf
    <div class="search-element">
      
      <input class="form-control" type="search" placeholder="Search Students" aria-label="Search Students" data-width="200" name="user_name">
      <button class="btn" type="submit">
        <i class="fas fa-search"></i>
      </button>
    </div>
  </form>
</li>
@endsection
@section('content')
@if (session()->has('search_users'))
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Search Students</h4>
          
        </div>
        <div class="card-body p-0">
            
                @if (session('search_users')->count()!=0)
                    @foreach (session('search_users') as $student)
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="card profile-widget">
                            <div class="profile-widget-header">
                                @if ($student->image)
                                <img alt="image" class="rounded-circle profile-widget-picture"
                                  src="{{ asset('storage/app/'.$student->image) }}">
                                    
                                     
                                    @else
                                    @if ($student->gender==1)
                                    <img alt="image" class="rounded-circle profile-widget-picture"
                                  src="{{ asset('public/back/assets/img/admin.png') }}">
                                    
                                    
                                    @endif
                                    @if ($student->gender==2)
                                    <img alt="image" class="rounded-circle profile-widget-picture"
                                  src="{{ asset('public/back/assets/img/adminf.png') }}">
                                    @endif
                                    @endif
                                
                                <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Mobile</div>
                                    <div class="profile-widget-item-value">0{{$student->mobile}}</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Reg: No</div>
                                    <div class="profile-widget-item-value">{{$student->user_name}}</div>
                                </div>
                                
                                </div>
                            </div>
                            <div class="profile-widget-description pb-0">
                                <div class="profile-widget-name">{{$student->title}} {{$student->f_name}} {{$student->l_name}} <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> {{$student->school}}
                                </div>
                                </div>
                                
                            </div>
                            <div class="card-footer text-center pt-0">
                                <a href="{{route('admin_student_single',$student->id)}}" class="btn btn-primary">Detail</a>
                            </div>
                            </div>
                        
                        </div>
                    @endforeach
                @else
                <div class="alert alert-danger">
                    No matching results in our Database!
                </div>
                @endif
            
          
        </div>
      </div>
    </div>
</div>
@endif
<div class="row ">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Website</h5>
                  <h2 class="mb-3 font-18">Front</h2>
                  <a href="{{route('admin_web')}}" class="btn btn-primary btn-sm">View</a>
                  
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('public/back/assets/img/banner/1.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15"> Teachers</h5>
                  <h2 class="mb-3 font-18">{{$users->where('role_id',2)->count()}}</h2>
                  <a href="{{route('admin_teachers')}}" class="btn btn-info btn-sm">View</a>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('public/back/assets/img/banner/2.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Students</h5>
                  <h2 class="mb-3 font-18">{{$users->where('role_id',4)->count()}}</h2>
                  <a href="{{route('admin_students')}}" class="btn btn-warning btn-sm">View</a>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('public/back/assets/img/banner/3.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="card">
        <div class="card-statistic-4">
          <div class="align-items-center justify-content-between">
            <div class="row ">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                <div class="card-content">
                  <h5 class="font-15">Today Clzs</h5>
                  <h2 class="mb-3 font-18">{{$batches->count()}}</h2>
                  <a href="#" class="btn btn-success btn-sm">View</a>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                <div class="banner-img">
                  <img src="{{ asset('public/back/assets/img/banner/4.png') }}" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row">
  
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>All Teachers</h4>
       
      </div>
      <div class="card-body p-0">
         
        <div class="table-responsive">
          <table class="table table-striped" id="sortable-table">
            <thead>
              <tr>
                <th class="text-center">
                  <i class="fas fa-th"></i>
                </th>
                <th>Name</th>
                
                <th>Courses</th>
                <th>Classes</th>
                
              </tr>
            </thead>
            <tbody>
                @foreach ($users->where('role_id',2) as $teacher)
                <tr>
                  <td>
                    <div class="sort-handler">
                      @if ($teacher->image)
                      <img alt="image" class="rounded-circle" width="35"
                        data-toggle="tooltip" title="{{$teacher->title}} {{$teacher->f_name}}" src="{{ asset('storage/app/'.$teacher->image) }}">
                          
                           
                          @else
                          @if ($teacher->gender==1)
                          <img alt="image" class="rounded-circle" width="35"
                        data-toggle="tooltip" title="{{$teacher->title}} {{$teacher->f_name}}" src="{{ asset('public/back/assets/img/admin.png') }}">
                          
                          
                          @endif
                          @if ($teacher->gender==2)
                          <img alt="image" class="rounded-circle" width="35"
                        data-toggle="tooltip" title="{{$teacher->title}} {{$teacher->f_name}}" src="{{ asset('public/back/assets/img/adminf.png') }}">
                          @endif
                          @endif
                      
                    </div>
                  </td>
                  <td>
                    <a href="{{route('admin_teacher_single',$teacher->id)}}">
                    {{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}
                  </a>
                    <div class=" text-small font-600-bold">
                      <span class="text-info"><i class="fas fa-tablet-alt"></i> 0{{$teacher->mobile}}</span> | 
                      @if ($teacher->is_active==1)
                      <span class="text-success">Active</span>
                      
                      @else
                      <span class="text-warning">Deactive</span>
                      
                     
                      @endif
                      
                    </div>
                  </td>
                
                  <td><a href="{{route('admin_teacher_groups',$teacher->id)}}" class="btn btn-sm btn-info">Courses</a></td>
                  <td><a href="{{route('admin_teacher_clz',$teacher->id)}}" class="btn btn-sm btn-success">Classes</a></td>
                 
                 
                </tr>
                @endforeach
              
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-6">
    <div class="card">
      <div class="card-header">
        <h4>Today Classes</h4>
       
      </div>
      <div class="card-body p-0">
         
        <div class="table-responsive">
          <table class="table table-striped" id="sortable-table">
            <thead>
              <tr>
                <th class="text-center">
                  <i class="fas fa-th"></i>
                </th>
                <th>Name</th>
                
                <th>Courses</th>
                <th>Classes</th>
                
              </tr>
            </thead>
            <tbody>
                @foreach ($batches as $batch)
                <tr>
                  <td>
                    <div class="sort-handler">
                      @if ($batch->user->image)
                      <img alt="image" class="rounded-circle" width="35"
                        data-toggle="tooltip" title="{{$batch->user->title}} {{$batch->user->f_name}}" src="{{ asset('storage/app/'.$batch->user->image) }}">
                          
                           
                          @else
                          @if ($batch->user->gender==1)
                          <img alt="image" class="rounded-circle" width="35"
                        data-toggle="tooltip" title="{{$batch->user->title}} {{$batch->user->f_name}}" src="{{ asset('public/back/assets/img/admin.png') }}">
                          
                          
                          @endif
                          @if ($batch->user->gender==2)
                          <img alt="image" class="rounded-circle" width="35"
                        data-toggle="tooltip" title="{{$batch->user->title}} {{$batch->user->f_name}}" src="{{ asset('public/back/assets/img/adminf.png') }}">
                          @endif
                          @endif
                      
                    </div>
                  </td>
                  <td>
                    <a href="{{route('admin_teacher_batch_single',$batch->id)}}">
                    {{$batch->user->title}} {{$batch->user->f_name}} {{$batch->user->l_name}}
                  </a>
                    <div class=" text-small font-600-bold">
                      <span class="text-info">{{$batch->grade->title}}</span> | <span class="text-info">{{$batch->subject->title}}</span> |
                      <span class="text-success">{{$batch->year}}</span> | <span class="text-success">{{$batch->title}}</span>
                     
                      
                    </div>
                  </td>
                
                  <td><a href="{{route('admin_teacher_batch_online',$batch->id)}}" class="btn btn-sm btn-info">Online</a></td>
                  <td><a href="{{route('admin_teacher_batch_mcq',$batch->id)}}" class="btn btn-sm btn-success">MCQ</a></td>
                 
                 
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
