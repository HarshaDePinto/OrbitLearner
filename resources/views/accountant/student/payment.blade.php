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
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                  aria-selected="true">Add Payment</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings1" role="tab"
                  aria-selected="false">Invoice</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                  aria-selected="false">All Unsettled Payment</a>
              </li>
             
              
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings3" role="tab"
                  aria-selected="false">All Classes</a>
              </li>
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                <form method="POST" enctype="multipart/form-data" action="{{route('accountant_student_payment_add')}}">
                    @csrf
                   
                    <div class="card-header">
                      <h4>Class Fees</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Select The Class</label>
                            <select onchange="myFunction(event)" class="form-control" name="b_student_id">
                                <option>---Select-----</option>
                                @foreach ($student->b_students as $cl)
                                    <option value={{$cl->id}}>
                                        
                                        {{$cl->g_batch->group->title}} | {{$cl->g_batch->year}} |{{$cl->g_batch->title}} | {{$cl->g_batch->user->title}}{{$cl->g_batch->user->f_name}} {{$cl->g_batch->user->l_name}}
                                    </option>
                                @endforeach
                                 
                            </select>
                           
                        </div>
                        
                       
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Year</label>
                          <input type="number" class="form-control" name="year" value="{{ now()->year }}">
                          
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Select Month </label>
                            <select class="form-control" name="month">
                               <option value="January"
                               @if (now()->format('F')=='January')
                                   selected
                               @endif
                               
                               >January</option>
                               <option value="February"
                               @if (now()->format('F')=='February')
                                   selected
                               @endif
                               >February</option>
                               <option value="March"
                               @if (now()->format('F')=='January')
                                   selected
                               @endif
                               >March</option>
                               <option value="April"
                               @if (now()->format('F')=='April')
                                   selected
                               @endif
                               
                               >April</option>
                               <option value="May"
                               @if (now()->format('F')=='May')
                                   selected
                               @endif
                               
                               >May</option>
                               <option value="June"
                               
                               @if (now()->format('F')=='June')
                                   selected
                               @endif
                               >June</option>
                               <option value="July"
                               @if (now()->format('F')=='July')
                                   selected
                               @endif
                               >July</option>
                               <option value="August"
                               @if (now()->format('F')=='August')
                                   selected
                               @endif
                               
                               >August</option>
                               <option value="September"
                               @if (now()->format('F')=='September')
                                   selected
                               @endif
                               
                               >September</option>
                               <option value="October"
                               @if (now()->format('F')=='October')
                                   selected
                               @endif
                               
                               >October</option>
                               <option value="November"
                               @if (now()->format('F')=='November')
                                   selected
                               @endif
                               
                               >November</option>
                               <option value="December"
                               @if (now()->format('F')=='December')
                                   selected
                               @endif
                               >December</option>
                               
                                 
                            </select>
                          
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Pay Type</label>
                            <div id="regPayType"></div>
                            
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Class Fees</label>
                            <div id="regFees"></div>
                            
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Should Pay</label>
                            <div id="regShould"></div>
                            
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label>Amount</label>
                            <div id="regAmount"></div>
                            
                        </div>
                        
                      </div>
                      
                     
                      
                    </div>
                    <input type="text" class="form-control" name="invoice_id" value="{{$invoice->id}}" hidden>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Add To Invoice</button>
                    </div>
                </form>

              </div>
              <div class="tab-pane fade" id="settings1" role="tabpanel" aria-labelledby="profile-tab2">
                
                <div class="invoice">
                    <div class="invoice-print">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="invoice-title">
                            <h2>{{$student->title}} {{$student->f_name}} {{$student->l_name}}</h2>
                            <div class="invoice-number">Order {{$student->user_name}}/{{$invoice->id}}</div>
                          </div>
                         
                          
                        </div>
                      </div>
                      <div class="row mt-4">
                        <div class="col-md-12">
                          
                          <div class="section-title text-info">Payments That Planing To Pay Now</div>
                          
                          <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                              <tr>
                                <th data-width="40">#</th>
                                <th>Class</th>
                                <th>Month</th>
                                <th>Fees</th>
                                <th>REMOVE</th>
                              </tr>
                              @foreach ($invoice->items as $index=>$item)
                                  
                                      <tr>
                                          <td>{{$index+1}}</td>
                                          <td>{{$item->b_payment->g_batch->group->title}} | {{$item->b_payment->g_batch->title}}</td>
                                          <td>{{$item->b_payment->month}}</td>
                                          <td>{{$item->amount}} LKR</td>
                                          <td>
                                            <form method="POST" enctype="multipart/form-data" action="{{route('student_item_add')}}">
                                                @csrf
                                                
                                                <input type="text" class="form-control" name="op" value="2" hidden>
                                                
                                                <input type="text" class="form-control" name="item_id" value="{{$item->id}}" hidden>
                                               
                                                <button class="btn btn-danger btn-sm">REMOVE</button>
                      
                                            </form>
                                            </td>
                                      </tr>
                                  
                              @endforeach
                            </table>
                          </div>
                          <div class="row mt-4">
                            <div class="col-lg-8">
                              <div class="section-title">Payment Method</div>
                              <p class="section-lead">Manual Payment</p>
                              
                            </div>
                            <div class="col-lg-4 text-right">
                              
                              <hr class="mt-2 mb-2">
                              <div class="invoice-detail-item">
                                <div class="invoice-detail-name">Total</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">{{$invoice->items->sum('amount')}} LKR</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    <div class="text-md-right">
                    <form method="POST"  action="{{route('accountant_payment')}}">  
                        @csrf
                        <input type="text" class="form-control" name="invoice_id" value="{{$invoice->id}}" hidden>
                        <input type="text" class="form-control" name="author" value="{{Auth::user()->user_name}}" hidden>
                      <button type="submit" class="btn btn-primary btn-icon icon-left"><i class="fas fa-hand-holding-usd"></i> Make Payment</button>
                    </form>
                    </div>
                </div>
            
              
              </div>
              <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="table-responsive">
                    <table class="table table-striped" id="sortable-table">
                    <thead>
                        <tr>
                        
                        <th>Class</th>
                        <th>Month</th>
                        <th>Online</th>
                        <th>Amount</th>
                        <th>Delete</th>
                        
                        
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($student->b_payments as $pay)
                        @if ($pay->status==0 || $pay->status==2)
                        <tr>
                            <td>
                                {{$pay->g_batch->group->title}}| {{$pay->g_batch->year}} |{{$pay->g_batch->title}} 
                                <div class=" text-small font-600-bold">
                                    <span class="text-info">{{$pay->g_batch->user->title}}{{$pay->g_batch->user->f_name}} {{$pay->g_batch->user->l_name}}</span>
                                   
                                    
                                </div>
                            </td>
                            <td>
                                {{$pay->code}}
                          
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
<script>
    function myFunction(e) {
        let clz =0;

        clz = e.target.value;
        const clzs = {!! json_encode($student->b_students) !!};
        var obj = clzs.find(function(cl, index) {
        if(cl.id == clz)
            return true;
        });
        let clzFees=obj.g_batch.fees;
        let com=obj.g_batch.teacher_commission;
        
        switch(obj.type) {
        case 0:
        document.getElementById("regPayType").innerHTML ="<input  id='pay_type' type='text' class='form-control' name='pay_type'  value='Full Pay' readonly>";
        document.getElementById("regFees").innerHTML =`<input  id='clz_fees' type='text' class='form-control' name='clz_fees'  value='${clzFees}' readonly>`;
        document.getElementById("regShould").innerHTML =`<input  id='shd_pay' type='text' class='form-control' name='shd_pay'  value='${clzFees}' readonly>`;
        document.getElementById("regAmount").innerHTML =`<input  id='amount' type='number' class='form-control' name='amount'  value='${clzFees}' required>`;
        break;
        case 1:
        document.getElementById("regPayType").innerHTML ="<input  id='pay_type' type='text' class='form-control' name='pay_type'  value='Half Pay' readonly>";
        document.getElementById("regFees").innerHTML =`<input  id='clz_fees' type='text' class='form-control' name='clz_fees'  value='${clzFees}' readonly>`;
        document.getElementById("regShould").innerHTML =`<input  id='shd_pay' type='text' class='form-control' name='shd_pay'  value='${clzFees/2}' readonly>`;
        document.getElementById("regAmount").innerHTML =`<input  id='amount' type='number' class='form-control' name='amount'  value='${clzFees/2}' required>`;
        break;
        break;
        case 2:
        document.getElementById("regPayType").innerHTML ="<input  id='pay_type' type='text' class='form-control' name='pay_type'  value='Free' readonly>";
        document.getElementById("regFees").innerHTML =`<input  id='clz_fees' type='text' class='form-control' name='clz_fees'  value='${clzFees}' readonly>`;
        document.getElementById("regShould").innerHTML =`<input  id='shd_pay' type='text' class='form-control' name='shd_pay'  value='${clzFees*0}' readonly>`;
        document.getElementById("regAmount").innerHTML =`<input  id='amount' type='number' class='form-control' name='amount'  value='${clzFees*0}' required>`;
        break;
        case 3:
        document.getElementById("regPayType").innerHTML ="<input  id='pay_type' type='text' class='form-control' name='pay_type'  value='Teacher Pay' readonly>";
        document.getElementById("regFees").innerHTML =`<input  id='clz_fees' type='text' class='form-control' name='clz_fees'  value='${clzFees}' readonly>`;
        document.getElementById("regShould").innerHTML =`<input  id='shd_pay' type='text' class='form-control' name='shd_pay'  value='${clzFees*com/100}' readonly>`;
        document.getElementById("regAmount").innerHTML =`<input  id='amount' type='number' class='form-control' name='amount'  value='${clzFees*com/100}' required>`;
        break;
        case 4:
        document.getElementById("regPayType").innerHTML ="<input  id='pay_type' type='text' class='form-control' name='pay_type'  value='Institute Pay' readonly>";
        document.getElementById("regFees").innerHTML =`<input  id='clz_fees' type='text' class='form-control' name='clz_fees'  value='${clzFees}' readonly>`;
        document.getElementById("regShould").innerHTML =`<input  id='shd_pay' type='text' class='form-control' name='shd_pay'  value='${clzFees*(100 - com)/100}' readonly>`;
        document.getElementById("regAmount").innerHTML =`<input  id='amount' type='number' class='form-control' name='amount'  value='${clzFees*(100 - com)/100}' required>`;
        break;
        default:
        document.getElementById("regPayType").innerHTML ="";
        document.getElementById("regFees").innerHTML =``;
        document.getElementById("regShould").innerHTML =``;
        document.getElementById("regAmount").innerHTML =``;
        }
        
        
        
}
</script>
@endsection