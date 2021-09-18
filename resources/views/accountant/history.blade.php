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
              <h4>Paid Invoices of {{$student->title}} {{$student->f_name}} {{$student->l_name}}</h4>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-striped table-md">
                  <tbody>
                    <tr>
                    
                        <th>Date</th>
                        <th>Method</th>
                        <th>Amount</th>
                        <th>Details</th>
                    </tr>
                    @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{date('d-M-Y', strtotime($invoice->updated_at))}}</td>
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
                        <td><a href="{{route('accountant_invoice',$invoice->id)}}" class="btn btn-primary btn-sm">Detail</a></td>
                    </tr>
                    @endforeach
                  
                  
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