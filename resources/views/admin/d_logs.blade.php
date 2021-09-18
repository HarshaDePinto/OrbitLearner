@extends('layouts.admin')
@section('styles')
<title>Deleted Items</title>
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-4 col-lg-4">
        <div class="card">
            
            <div class="card-header">
            <h4>Select Date Range</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin_delete_search')}}">
                    @csrf
                    <div class="form-group">
                        <label>From</label>
                        <input type="date" class="form-control" name="s_day" required>
                    </div>
                    <div class="form-group">
                        <label>To</label>
                        <input type="date" class="form-control" name="e_day" required>
                    </div>
                    
                    
                   
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            
            </div>
        </div>
       
     
    </div>
    <div class="col-12 col-md-8 col-lg-8">
        @if (session()->has('s_logs'))
        <div class="card">
            <div class="card-header">
              <h4>Deleted From {{date('d-M-Y', strtotime(session('startDate')))}} To {{date('d-M-Y', strtotime(session('endDate')))}} </h4>
            </div>
            @if (session('s_logs')->count()!=0)
                    
                    <div class="card-body">
                        <table class="table table-bordered table-md">
                            <thead>
                                <th>
                                    Item
                                </th>
                                <th>
                                    Deleted By
                                </th>
                                <th>
                                    Date
                                </th>
                            </thead>
                            <tbody>
                                @foreach (session('s_logs') as $log)
                                    <tr>
                                        <td>{{$log->des}}</td>
                                        <td>{{$log->user->title}} {{$log->user->f_name}} {{$log->user->l_name}}</td>
                                        <td>{{date('d-M-Y', strtotime($log->created_at))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                      </div>
                   
                @else
                <div class="card-body">
                <div class="alert alert-danger">
                    No matching results in our Database!
                </div>
                </div>
            @endif
            
        </div>
                
        @endif
        <div class="card">
            <div class="card-header">
              <h4>Recently Deleted Items</h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-md">
                  <thead>
                      <th>
                          Item
                      </th>
                      <th>
                          Deletde By
                      </th>
                      <th>
                          Date
                      </th>
                  </thead>
                  <tbody>
                      @foreach ($logs as $log)
                          <tr>
                              <td>{{$log->des}}</td>
                              <td>{{$log->user->title}} {{$log->user->f_name}} {{$log->user->l_name}}</td>
                              <td>{{date('d-M-Y', strtotime($log->created_at))}}</td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
        </div>
     
    </div>
</div>

@endsection

@section('scripts')

@endsection