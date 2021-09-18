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
        
        

        
      </div>
      <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="padding-20">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                  aria-selected="true">Account</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings3" role="tab"
                  aria-selected="false">Classes</a>
              </li>
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
               

                
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                    <thead>
                        <tr>
                        
                        <th>Date</th>
                        <th>Description</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td  ><h6>Balance</h6> </td>
                            <td colspan="3">@if ($acc->bal>0 || $acc->bal==0)
                                <span class="text-success" ><b>{{$acc->bal}} LKR</b></span>
                            @else
                            <span class="text-danger" ><b>{{$acc->bal}} LKR</b></span>
                            @endif </td>
                        </tr>
                        @if ($acc->u_a_entries)
                        @foreach ($acc->u_a_entries as $entry)
                        <tr>
                            <td>
                                {{date('d-m-Y', strtotime($entry->created_at))}}
                            </td>
                            <td>
                                {{$entry->des}}
                          
                            </td>
                            <td>
                                @if ($entry->type==0)
                                <span class="text-success" ><b>{{$entry->amount}} LKR</b></span>
                            @else
                                -
                            @endif
                            </td>
                                
                            <td>
                                @if ($entry->type==1)
                                <span class="text-danger" ><b>-({{$entry->amount}} LKR)</b></span>
                                @else
                                    -
                                @endif
                            </td>
                            
                            
                        
                        
                        </tr>
                        @endforeach
                        @endif
                        
                        
                        
                    </tbody>
                    </table>
                    
                </div>
                
               
              </div>
              
                <div class="tab-pane fade" id="settings3" role="tabpanel" aria-labelledby="profile-tab2">
               
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                            
                            <th>Class</th>
                            
                            <th>Details</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teacher->g_batches as $cl)
                            
                            <tr>
                                <td>
                                    {{$cl->group->title}} | {{$cl->year}} |{{$cl->title}}
                                    
                                </td>
                               
                            
                                <td>
                                  <a href="{{route('accountant_class_account',$cl->id)}}" class="btn btn-primary btn-sm">view</a>
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