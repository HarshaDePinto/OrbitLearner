@extends('layouts.accountant')

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
                                    <div class="author-box-job">
                                        @if ($student->u_accounts->count()==1)
                                            @foreach ($student->u_accounts as $account)
                                                @if ($account->bal>0)
                                                    <span class="text-success"><b>{{$account->bal}}</b></span>
                                                @else
                                                <span class="text-danger"><b>{{$account->bal}}</b></span>
                                                @endif
                                            @endforeach
                                            
                                        @endif
                                    </div>
                                    <div class="author-box-job"><b>Updated By: {{$student->author}} <br> {{$student->updated_at->diffForHumans()}}</b></div>
                                  </div>
                                  
                                </div>
                            </div>
                        
                        </div>
                        <div class="col-12 col-md-12 col-lg-8">
                            <div class="card">
                              <div class="padding-20">
                                    @if ($student->b_students->count()==0)
                                    No Classes
                                    @else
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
                                                @foreach ($student->b_students as $clz)
                                                <tr>
                                                    <td>
                                                        {{$clz->g_batch->group->title}} | {{$clz->g_batch->year}} |{{$clz->g_batch->title}}
                                                        <div class=" text-small font-600-bold">
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
                                                              
                                                            
                                                            
                                                        </div>
                                                    </td>
                                                    <td>
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
                                                  
                                                    </td>
                                                
                                                    <td>
                                                      <a href="{{route('accountant_student_class',$clz->id)}}" class="btn btn-primary btn-sm">view</a>
                                                    </td>
                                                    
                                                    
                                                
                                                
                                                </tr>
                                                @endforeach
                                                
                                                
                                            </tbody>
                                            </table>
                                            <div class="card-footer text-right">
                                              <a href="{{route('accountant_student_payment',$student->id)}}" class="btn btn-primary">Make Payment</a>
                                            </div>
                                        </div>


                                    @endif
                                  
                                 
                              </div>
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
<section class="section">
    <div class="section-body">
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
       
        
    </div>
</section>
@endsection