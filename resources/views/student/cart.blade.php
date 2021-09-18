@extends('layouts.student')
@section('styles')

@endsection
@section('content')
<section class="section">
    <div class="section-body">
      <div class="invoice">
        <div class="invoice-print">
          <div class="row">
            <div class="col-lg-12">
              <div class="invoice-title">
                <h2>Create Invoice</h2>
                <div class="invoice-number">Order {{$student->user_name}}/{{$invoice->id}}</div>
              </div>
             
              
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-12">
              <div class="section-title">All Unpaid Class fees</div>
              <p class="section-lead text-success">Please select items that you like to pay.</p>
              <div class="table-responsive">
                <table class="table table-striped table-hover table-md">
                  <tr>
                    <th data-width="40">#</th>
                    <th>Class</th>
                    <th>Month</th>
                    <th>Fees</th>
                    <th>ADD</th>
                  </tr>
                  @foreach ($payments as $index=>$pay)
                      @if ($pay->items->where('invoice_id',$invoice->id)->count()==0)
                          <tr>
                              <td>{{$index+1}}</td>
                              <td>{{$pay->g_batch->group->title}} | {{$pay->g_batch->title}}</td>
                              <td>{{$pay->month}}</td>
                              <td>{{$pay->amount}} LKR</td>
                              <td>
                                <form method="POST" enctype="multipart/form-data" action="{{route('student_item_add')}}">
                                    @csrf
                                    <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                                    <input type="text" class="form-control" name="op" value="1" hidden>
                                    <input type="text" class="form-control" name="invoice_id" value="{{$invoice->id}}" hidden>
                                    <input type="text" class="form-control" name="b_payment_id" value="{{$pay->id}}" hidden>
                                   
                                    <button class="btn btn-success btn-sm">ADD</button>
          
                                </form>
                              </td>
                          </tr>
                      @endif
                  @endforeach
                </table>
              </div>
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
                              <td>{{$item->b_payment->amount}} LKR</td>
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
                  <p class="section-lead">You Can Pay Online or You can go to Sadhana Educational Center to pay.</p>
                  
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
        <form method="post" action="https://www.payhere.lk/pay/checkout">  
        <input type="hidden" name="merchant_id" value="218229"> 
        <input type="hidden" name="return_url" value="{{route('payment_return')}}">
        <input type="hidden" name="cancel_url" value="{{route('payment_cancel')}}">
        <input type="hidden" name="notify_url" value="{{route('payment_notify')}}">
        <input type="text" name="order_id" value="{{$invoice->id}}" hidden>
        <input type="text" name="items" value="Class Fees" hidden> 
        <input type="text" name="currency" value="LKR" hidden>
        <input type="text" name="amount" value="{{$invoice->items->sum('amount')}}" hidden> 
        <input type="text" name="first_name" value="{{$student->f_name}}" hidden>
        <input type="text" name="last_name" value="{{$student->l_name}}" hidden>
        <input type="text" name="email" value="{{$student->email}}" hidden>
        <input type="text" name="phone" value="0{{$student->mobile}}" hidden>
        <input type="text" name="address" value="Sadhana Institute" hidden>
        <input type="text" name="city" value="Colombo" hidden>
        <input type="hidden" name="country" value="Sri Lanka">
          <button type="submit" class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Pay Online</button>
        </form>
        </div>
      </div>
    </div>
</section>



@endsection
@section('scripts')
<script src="{{ asset('public/back/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/advance-table.js') }}"></script>
@endsection