@extends('layouts.admin')
@section('styles')
@if (session()->has('s_sts'))
<title>Registered From {{date('d-M-Y', strtotime(session('startDate')))}} To {{date('d-M-Y', strtotime(session('endDate')))}} | All Students </title>
@else
<title>All Students</title>
@endif

<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/back/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('search')
<li>
  <form class="form-inline mr-auto" method="POST" action="{{route('user_search')}}">
    @csrf
    <div class="search-element">
      
      <input class="form-control" type="search" placeholder="Search" aria-label="Search Students" data-width="200" name="user_name">
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

<div class="row">
  <div class="col-12 col-md-6 col-lg-6">
    <form method="POST" enctype="multipart/form-data" action="{{route('user_search')}}">
      @csrf
      <div class="card">
        <div class="card-header">
          <h4>Get Student By Orbit ID</h4>
        </div>
        <div class="card-body">
        
            <div class="form-row">
              <div class="form-group col-12">
                <label for="user_name">Orbit ID</label>
                <input type="text" class="form-control" id="user_name" name="user_name" required>
              </div>
             
             
            </div>
          
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
      
     
   
  </div>
  <div class="col-12 col-md-6 col-lg-6">
    <form method="POST" enctype="multipart/form-data" action="{{route('sad_search')}}">
      @csrf
      <div class="card">
        <div class="card-header">
          <h4>Get Student By Sadhana ID</h4>
        </div>
        <div class="card-body">
        
            <div class="form-row">
              <div class="form-group col-12">
                <label for="sadhana_reg_number">Sadhana ID</label>
                <input type="text" class="form-control" id="sadhana_reg_number" name="sadhana_reg_number" required>
              </div>
             
             
            </div>
          
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
      
     
   
  </div>
  
</div>

<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <form method="POST" enctype="multipart/form-data" action="{{route('student_search')}}">
      @csrf
      <div class="card">
        <div class="card-header">
          <h4>Get Student List</h4>
        </div>
        <div class="card-body">
        
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="s_day">From</label>
                <input type="date" class="form-control" id="s_day" name="s_day" required>
              </div>
              <div class="form-group col-md-4">
                <label for="e_day">To</label>
                <input type="date" class="form-control" id="e_day" name="e_day" required>
              </div>
             
            </div>
          
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
      
     
   
  </div>
  
</div>
@if (session()->has('s_sts'))
<div class="row">
      
  <div class="col-12">
    <div class="card">
        <div class="card">
            <div class="card-header">
              <h4>From {{date('d-M-Y', strtotime(session('startDate')))}} To {{date('d-M-Y', strtotime(session('endDate')))}} | 
               
                All Students 
               
                
              </h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                  <thead>
                    <tr>
                        <th></th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Reg: Date</th>
                     
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach (session('s_sts') as $student)
                    <tr>
                      <td>
                        <div class="sort-handler">
                          @if ($student->image)
                          <img alt="image" class="rounded-circle" width="35"
                            data-toggle="tooltip" title="{{$student->title}} {{$student->f_name}}" src="{{ asset('storage/app/'.$student->image) }}">
                              
                               
                              @else
                              @if ($student->gender==1)
                              <img alt="image" class="rounded-circle" width="35"
                            data-toggle="tooltip" title="{{$student->title}} {{$student->f_name}}" src="{{ asset('public/back/assets/img/admin.png') }}">
                              
                              
                              @endif
                              @if ($student->gender==2)
                              <img alt="image" class="rounded-circle" width="35"
                            data-toggle="tooltip" title="{{$student->title}} {{$student->f_name}}" src="{{ asset('public/back/assets/img/adminf.png') }}">
                              @endif
                              @endif
                          
                        </div>
                      </td>
                      <td> <a href="{{route('admin_student_single',$student->id)}}" target="_blank">{{$student->title}} {{$student->f_name}} {{$student->l_name}}</a>
                        
                        <div class="text-success text-small font-600-bold">{{$student->user_name}}</div>
                        </td>
                     <td>
                      0{{$student->mobile}}
                     </td>
                     <td>{{date('d-m-Y', strtotime($student->created_at))}}</td>
                      
                      
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

@endif
@endsection

@section('scripts')

<script src="{{ asset('public/back/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/back/assets/bundles/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/js/page/datatables.js') }}"></script>
@endsection