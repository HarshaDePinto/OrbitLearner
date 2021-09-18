@extends('layouts.admin')
@section('styles')
<title>All Designers</title>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Designers</h4>
          <div class="card-header-action">
            
            <form method="POST" action="{{route('user_search')}}">
                @csrf
              <div class="input-group">
                <input type="text" class="form-control" name="user_name" placeholder="Search">
                <div class="input-group-btn">
                  <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card-body p-0">
            @if (session()->has('search_users'))
                @if (session('search_users')->count()!=0)
                    @foreach (session('search_users') as $teacher)
                        <div class="col-12 col-sm-12 col-lg-6">
                            <div class="card profile-widget">
                            <div class="profile-widget-header">
                                @if ($teacher->image)
                                <img alt="image" class="rounded-circle profile-widget-picture"
                                  src="{{ asset('storage/app/'.$teacher->image) }}">
                                    
                                     
                                    @else
                                    @if ($teacher->gender==1)
                                    <img alt="image" class="rounded-circle profile-widget-picture"
                                  src="{{ asset('public/back/assets/img/admin.png') }}">
                                    
                                    
                                    @endif
                                    @if ($teacher->gender==2)
                                    <img alt="image" class="rounded-circle profile-widget-picture"
                                  src="{{ asset('public/back/assets/img/adminf.png') }}">
                                    @endif
                                    @endif
                                
                                <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Mobile</div>
                                    <div class="profile-widget-item-value">0{{$teacher->mobile}}</div>
                                </div>
                                
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Reg:No</div>
                                    <div class="profile-widget-item-value">{{$teacher->user_name}}</div>
                                </div>
                                </div>
                            </div>
                            <div class="profile-widget-description pb-0">
                                <div class="profile-widget-name">{{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}} <div class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> {{$teacher->school}}
                                </div>
                                </div>
                                <p>{!!$teacher->des!!}</p>
                            </div>
                            <div class="card-footer text-center pt-0">
                                <a href="{{route('admin_teacher_single',$teacher->id)}}" class="btn btn-primary">Detail</a>
                                
                            </div>
                            </div>
                        
                        </div>
                    @endforeach
                @else
                <div class="alert alert-danger">
                    No matching results in our Database!
                </div>
                @endif
            @endif
          <div class="table-responsive">
            <table class="table table-striped" id="sortable-table">
              <thead>
                <tr>
                  <th class="text-center">
                    <i class="fas fa-th"></i>
                  </th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($designers as $teacher)
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
                      {{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}
                      <div class=" text-small font-600-bold">
                        <span class="text-info"><i class="fas fa-tablet-alt"></i> 0{{$teacher->mobile}}</span> | 
                        @if ($teacher->is_active==1)
                        <span class="text-success">Active</span>
                        
                        @else
                        <span class="text-warning">Deactive</span>
                        
                       
                        @endif
                        
                      </div>
                    </td>
                  
                   
                    <td><a href="{{route('admin_teacher_single',$teacher->id)}}" class="btn btn-primary">Detail</a></td>
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