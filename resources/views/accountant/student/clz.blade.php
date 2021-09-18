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
                @if ($student->image)
                <img alt="image" src="{{ asset('storage/app/'.$student->image) }}" class="rounded-circle author-box-picture">  
                 @else
                 @if ($student->gender==1)
                 <img alt="image" src="{{ asset('public/back/assets/img/admin.png') }}" class="rounded-circle author-box-picture">
                 @endif
                 @if ($student->gender==2)
                 <img alt="image" src="{{ asset('public/back/assets/img/adminf.png') }}" class="rounded-circle author-box-picture">
                 @endif
                 
                
                @endif
              
              <div class="clearfix"></div>
              <div class="author-box-name">
                <a href="#">{{$student->title}} {{$student->f_name}} {{$student->l_name}}</a>
              </div>
              <div class="author-box-job">{{$student->user_name}} | @if ($student->is_sadhana==1)
                 {{$student->sadhana_reg_number}} 
              @else
                 Not A Student of Sadhana
              @endif</div>
              <div class="author-box-job"><b>Updated By: {{$clz->author}} <br> {{$clz->updated_at->diffForHumans()}}</b></div>
            </div>
            
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4>{{$clz->g_batch->group->title}} | {{$clz->g_batch->year}} |{{$clz->g_batch->title}}</h4>
          </div>
          <div class="card-body">
            <div class="py-4">
              <p class="clearfix">
                <span class="float-left">
                  Pay Type
                </span>
                <span class="float-right">
                    @if ($clz->type==0)
                        <span class="text-success">Full Pay</span>
                    @endif
                    @if ($clz->type==1)
                        <span class="text-info">Half Pay</span>
                                                            @endif
                                                            @if ($clz->type==2)
                                                            <span class="text-danger">Free</span>
                                                            @endif
                                                            @if ($clz->type==3)
                                                            <span class="text-danger">Teacher Pay</span>
                                                            @endif
                                                            @if ($clz->type==4)
                                                            <span class="text-warning">Institute Pay</span>
                                                            @endif
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Status
                </span>
                <span class="float-right">
                    @if ($clz->status==0)
                        <span class="text-success">Active</span>
                    @endif
                    @if ($clz->status==1)
                        <span class="text-danger">Deactive</span>
                    @endif
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Class Account
                </span>
                <span class="float-right">
                    @if ($clz->b_s_accounts->count()==1)

                    @foreach ($clz->b_s_accounts as $acc)
                       @if ($acc->bal>0 || $acc->bal==0)
                           <span class="text-success" ><b>{{$acc->bal}} LKR</b></span>
                       @else
                       <span class="text-danger" ><b>{{$acc->bal}} LKR</b></span>
                       @endif 
                    @endforeach
                    
                @else
                    <p class="text-danger">Error Contact Z Tech Digital</P>
                @endif
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Registered Day
                </span>
                <span class="float-right text-info">
                  {{$clz->created_at}}
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
                  aria-selected="true">Account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                  aria-selected="false">Unsettled Payment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings1" role="tab"
                  aria-selected="false">Settled Payment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings2" role="tab"
                  aria-selected="false">Edit Pay Type</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings3" role="tab"
                  aria-selected="false">Other Classes</a>
              </li>
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                @if ($clz->b_s_accounts->count()==1)

                @foreach ($clz->b_s_accounts as $acc)
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
                        @foreach ($acc->b_s_a_entries as $entry)
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
                        
                        
                    </tbody>
                    </table>
                    <div class="card-footer text-right">
                        <a href="{{route('accountant_student_payment',$student->id)}}" class="btn btn-primary">Make Payment</a>
                    </div>
                </div>
                @endforeach
                
                @else
                    <p class="text-danger">Error Contact Z Tech Digital</P>
                @endif
              </div>
              <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
               
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                    <thead>
                        <tr>
                        
                        <th>Year</th>
                        <th>Month</th>
                        <th>Updated By</th>
                        <th>Online</th>
                        <th>Amount</th>
                        <th>Delete</th>
                        
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($clz->b_payments as $pay)
                        @if ($pay->status==0 || $pay->status==2)
                        <tr>
                            <td>
                                {{$pay->year}}
                            </td>
                            <td>
                                {{$pay->month}}
                          
                            </td>
                            <td>
                                {{$pay->author}}
                            </td>
                            <td>
                                @if ($pay->status==0)
                                    <span class="text-danger">Deactivated</span>
                                    <br>
                                    <a href="{{route('accountant_student_online',$pay->id)}}" class="btn btn-sm btn-success">Make Active</a> 
                                @endif
                                @if ($pay->status==2)
                                <span class="text-info">Activated</span>
                                <br>
                                <a href="{{route('accountant_student_online',$pay->id)}}" class="btn btn-sm btn-danger">Make Deactive</a>
                                @endif
                               
                                
                            </td>
                                
                            <td>
                                {{$pay->amount}} LKR
                            </td>
                            <td>
                                <a href="{{route('accountant_student_pay_delete',$pay->id)}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                            
                            
                        
                        
                        </tr>
                        @endif
                        
                        @endforeach
                        
                        
                    </tbody>
                    </table>
                   
                </div>
            
              
              </div>
                <div class="tab-pane fade" id="settings1" role="tabpanel" aria-labelledby="profile-tab2">
               
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                            
                            <th>Year</th>
                            <th>Month</th>
                            <th>Add By</th>
                            
                            <th>Amount</th>
                            
                            
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($clz->b_payments as $pay)
                            @if ($pay->status==1)
                            <tr>
                                <td>
                                    {{$pay->year}}
                                </td>
                                <td>
                                    {{$pay->month}}
                            
                                </td>
                                <td>
                                    {{$pay->author}}
                                </td>
                               
                                    
                                <td>
                                    {{$pay->amount}}
                                </td>
                                
                                
                            
                            
                            </tr>
                            @endif
                            
                            @endforeach
                            
                            
                        </tbody>
                        </table>
                    
                    </div>
            
              
                </div>
                <div class="tab-pane fade" id="settings2" role="tabpanel" aria-labelledby="home-tab2">
                    <form method="POST" enctype="multipart/form-data" action="{{route('accountant_student_class_update',$clz->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                          <h4>Edit Student Status</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Pay Type</label>
                                <select class="form-control" name="type">
                                  <option value="0" 
                                  @if ($clz->type==0)
                                      selected
                                  @endif
                                  >Full Pay</option>
                                  <option value="1"
                                  @if ($clz->type==1)
                                      selected
                                  @endif
                                  >Half Pay</option>
                                  <option value="2"
                                  
                                  @if ($clz->type==2)
                                      selected
                                  @endif
                                  >Free</option>
                                  <option value="3"
                                  @if ($clz->type==3)
                                      selected
                                  @endif
                                  >Teacher Pay</option>
                                  <option value="4"
                                  @if ($clz->type==4)
                                      selected
                                  @endif
                                  >Institute Pay</option>
                                 
                                </select>
                               
                            </div>
                            
                           
                          </div>
                       
                        </div>
                        <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                        <div class="card-footer text-right">
                          <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="settings3" role="tabpanel" aria-labelledby="profile-tab2">
               
                    <div class="table-responsive">
                        <table class="table table-striped" id="sortable-table">
                        <thead>
                            <tr>
                            
                            <th>Class</th>
                            <th>Account</th>
                            <th>Edit</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student->b_students as $cl)
                            @if ($cl->id!=$clz->id)
                            <tr>
                                <td>
                                    {{$cl->g_batch->group->title}} | {{$cl->g_batch->year}} |{{$cl->g_batch->title}}
                                    <div class=" text-small font-600-bold">
                                        @if ($cl->type==0)
                                        <span class="text-success">Full Pay</span>
                                        @endif
                                        @if ($cl->type==1)
                                        <span class="text-info">Half Pay</span>
                                        @endif
                                        @if ($cl->type==2)
                                        <span class="text-danger">Free</span>
                                        @endif
                                        @if ($cl->type==3)
                                        <span class="text-danger">Teacher Pay</span>
                                        @endif
                                        @if ($cl->type==4)
                                        <span class="text-warning">Institute Pay</span>
                                        @endif
                                          
                                        
                                        
                                    </div>
                                </td>
                                <td>
                                    @if ($cl->b_s_accounts->count()==1)

                                        @foreach ($cl->b_s_accounts as $acc)
                                           @if ($acc->bal>0 || $acc->bal==0)
                                               <span class="text-success" ><b>{{$acc->bal}} LKR</b></span>
                                           @else
                                           <span class="text-danger" ><b>{{$acc->bal}} LKR</b></span>
                                           @endif 
                                        @endforeach
                                        
                                    @else
                                        <p class="text-danger">Error Contact Z Tech Digital</P>
                                    @endif
                              
                                </td>
                            
                                <td>
                                  <a href="{{route('accountant_student_class',$cl->id)}}" class="btn btn-primary btn-sm">view</a>
                                </td>
                                
                                
                            
                            
                            </tr>
                            @endif
                            
                            @endforeach
                            
                            
                        </tbody>
                        </table>
                        <div class="card-footer text-right">
                          <a href="{{route('accountant_student_payment',$student->id)}}" class="btn btn-primary">Make Payment</a>
                        </div>
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