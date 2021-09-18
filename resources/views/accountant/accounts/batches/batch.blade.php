@extends('layouts.accountant')
@section('styles')
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/select2/dist/css/select2.min.css') }}">
@endsection
@section('content')
<div class="section-body">
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-4">
        <div class="card author-box">
          <div class="card-body">
            <div class="author-box-center">
                @if ($teacher->image)
                <img alt="image" src="{{ asset('storage/app/'.$teacher->image) }}" class="rounded-circle author-box-picture">  
                 @else
                 @if ($teacher->gender==1)
                 <img alt="image" src="{{ asset('public/back/assets/img/admin.png') }}" class="rounded-circle author-box-picture">
                 @endif
                 @if ($teacher->gender==2)
                 <img alt="image" src="{{ asset('public/back/assets/img/adminf.png') }}" class="rounded-circle author-box-picture">
                 @endif
                 
                
                @endif
              
              <div class="clearfix"></div>
              <div class="author-box-name">
                <a href="#">{{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}</a>
              </div>
              <div class="author-box-job">{{$teacher->user_name}}</div>
              <div class="author-box-job"><b>Updated By: {{$teacher->author}} <br> {{$teacher->updated_at->diffForHumans()}}</b></div>
            </div>


            
          </div>
        </div>
        <div class="card">
            <div class="card-header">
              <h4>{{$clz->group->title}} | {{$clz->year}} |{{$clz->title}}</h4>
            </div>
            <div class="card-body">
              <div class="py-4">
                <p class="clearfix">
                  <span class="float-left">
                    Paid For {{now()->format('F')}}
                  </span>
                  <span class="float-right">
                        {{$thisMonthPay->count()}}
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Teachers Commision
                  </span>
                  <span class="float-right">
                    {{$thisMonthTeacher->sum('amount')}} LKR
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Institute Commision
                  </span>
                  <span class="float-right">
                    {{$thisMonthInstitute->sum('amount')}} LKR
                  </span>
                </p>
                <p class="clearfix">
                  <span class="float-left">
                    Total
                  </span>
                  <span class="float-right text-info">
                    {{$thisMonthPay->sum('amount')}} LKR
                  </span>
                </p>
                
              </div>
            </div>
        </div>
        
        

        
      </div>
      <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="padding-20">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                  aria-selected="true">Paid Students</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings3" role="tab"
                  aria-selected="false">Teacher Commision</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings2" role="tab"
                  aria-selected="false">Institute Commision</a>
              </li>
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
               

                
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                    <thead>
                        <tr>
                        
                        <th>Date</th>
                        <th>Student</th>
                        <th>Amount</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                       
                        
                        @foreach ($thisMonthPay as $entry)
                        <tr>
                            <td>
                                {{date('d-m-Y', strtotime($entry->created_at))}}
                            </td>
                            <td>
                                {{$entry->user->f_name}} {{$entry->user->l_name}}
                          
                            </td>
                            <td>
                                {{$entry->amount}}
                            </td>

                        </tr>
                        @endforeach
                       
                        
                        
                        
                    </tbody>
                    </table>
                    
                </div>
                
               
              </div>
              
                <div class="tab-pane fade" id="settings3" role="tabpanel" aria-labelledby="profile-tab2">
               
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                            
                            <th>Date</th>
                            <th>Student</th>
                            <th>Amount</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                           
                            
                            @foreach ($thisMonthTeacher as $entry)
                            <tr>
                                <td>
                                    {{date('d-m-Y', strtotime($entry->created_at))}}
                                </td>
                                <td>
                                    {{$entry->des}}
                              
                                </td>
                                <td>
                                    {{$entry->amount}}
                                </td>
    
                            </tr>
                            @endforeach
                           
                            
                            
                            
                        </tbody>
                        </table>
                        
                    </div>
                
                  
                </div>

                <div class="tab-pane fade" id="settings2" role="tabpanel" aria-labelledby="profile-tab2">
               
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                            
                            <th>Date</th>
                            <th>Student</th>
                            <th>Amount</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                           
                            
                            @foreach ($thisMonthInstitute as $entry)
                            <tr>
                                <td>
                                    {{date('d-m-Y', strtotime($entry->created_at))}}
                                </td>
                                <td>
                                    {{$entry->des}}
                              
                                </td>
                                <td>
                                    {{$entry->amount}}
                                </td>
    
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
  </div>
@endsection
@section('scripts')
<script src="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('public/back/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/forms-advanced-forms.js') }}"></script>
@endsection