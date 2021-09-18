@extends('layouts.accountant')
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
                <h2>Invoice</h2>
                <div class="invoice-number"></div>
              </div>
             
              
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-12">
              
              <div class="section-title text-info">Invoice Status</div>
              @if ($invoice->status==0)
              <p class="section-lead text-danger">Not Paid Yet.</p>
              @endif
              @if ($invoice->status==2)
              <p class="section-lead text-success">Paid</p>
              @endif
              <div class="table-responsive">
                <table class="table table-striped table-hover table-md">
                  <tr>
                    <th data-width="40">#</th>
                    <th>Class</th>
                    <th>Month</th>
                    <th>Fees</th>
                    
                  </tr>
                  @foreach ($invoice->items as $index=>$item)
                      
                          <tr>
                              <td>{{$index+1}}</td>
                              <td>{{$item->b_payment->g_batch->group->title}} | {{$item->b_payment->g_batch->title}}</td>
                              <td>{{$item->b_payment->month}}</td>
                              <td>{{$item->b_payment->amount}} LKR</td>
                            
                          </tr>
                      
                  @endforeach
                </table>
              </div>
              <div class="row mt-4">
                @if ($invoice->method==1)
                <div class="col-lg-8">
                  <div class="section-title">Online Payment By : {{$invoice->payment_method}}</div>
                  <p class="section-lead">Payment ID: {{$invoice->payment_id}}</p>
                  <p class="section-lead">Card Holder(Visa Only): {{$invoice->card_holder_name}}</p>
                  <p class="section-lead">Card No(Visa Only): {{$invoice->card_no}}</p>
                  <p class="section-lead">Card Expiry(Visa Only): {{$invoice->card_expiry}}</p>
                  
                </div>
                @endif
                @if ($invoice->method==2)
                <div class="col-lg-8">
                  <div class="section-title">Manual Payment</div>
                  <p class="section-lead">Approved By: {{$invoice->author}}</p>
                  
                  
                </div>
                @endif
               
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
        
        </div>
      </div>
    </div>
</section>



@endsection
@section('scripts')

@endsection