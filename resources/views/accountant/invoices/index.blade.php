@extends('layouts.accountant')
@section('styles')

@endsection
@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
       
        <div class="col-12 col-md-12 col-lg-12">
          <div class="card">
            <div class="card-header">
              <h4>Paid Invoices of {{now()->format('F')}} </h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tbody>
                    <tr>
                    
                        <th>Date</th>
                        <th>Student</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Details</th>
                    </tr>
                    @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{date('d-M-Y', strtotime($invoice->updated_at))}}</td>
                        <td>{{$invoice->user->title}} {{$invoice->user->f_name}} {{$invoice->user->l_name}}
                          <div class=" text-small font-600-bold">
                            <span class="text-info"><i class="fas fa-tablet-alt"></i>{{$invoice->user->user_name}}</span> | 
                            @if ($invoice->user->is_sadhana==1)
                            <span class="text-success">{{$invoice->user->sadhana_reg_number}}</span>
                            
                            @else
                            <span class="text-warning">Not A Student of Sadhana</span>
                            
                           
                            @endif
                            
                          </div>
                        
                        </td>
                        <td>
                            @if ($invoice->method==1)
                                Online
                            @endif
                            @if ($invoice->method==2)
                                Manual
                            @endif
                        </td>
                        <td>
                          <div class="badge badge-success">{{$invoice->items->sum('amount')}} LKR</div>
                        </td>
                        <td><a href="{{route('accountant_paid_invoice_s',$invoice->id)}}" class="btn btn-primary btn-sm">Detail</a></td>
                    </tr>
                    @endforeach
                  <tr>
                      <td colspan="3">Total Online Payment for {{now()->format('F')}} 
                        <div class=" text-small font-600-bold">
                            <span class="text-info">Number Of Payments</span> : <span class="text-success">{{$invoices->where('method',1)->count()}}</span>
                            
                          </div>
                        </td>
                      <td colspan="2">{{$online_total}} LKR</td>
                  </tr>
                  <tr>
                    <td colspan="3">Total Manual Payment for {{now()->format('F')}}
                        <div class=" text-small font-600-bold">
                            <span class="text-info">Number Of Payments</span> : <span class="text-success">{{$invoices->where('method',2)->count()}}</span>
                            
                          </div>
                    </td>
                    <td colspan="2">{{$manual_total}} LKR</td>
                </tr>
                <tr>
                    <td colspan="3">Total Payment for {{now()->format('F')}} 
                        <div class=" text-small font-600-bold">
                            <span class="text-info">Number Of Payments</span> : <span class="text-success">{{$invoices->count()}}</span>
                            
                          </div>
                    </td>
                    <td colspan="2">{{$manual_total + $online_total }} LKR</td>
                </tr>
                  
                </tbody></table>
              </div>
            </div>
            <div class="card-footer text-right">
              
            </div>
          </div>
        </div>
      </div>
      
      
    </div>
  </section>



@endsection
@section('scripts')

@endsection
