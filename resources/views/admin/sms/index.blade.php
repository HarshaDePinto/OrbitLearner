
@extends('layouts.admin')
@section('styles')
<title>SMS</title>
@endsection

@section('content')
@if (session()->has('s_msgs'))
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>SMS From {{date('d-M-Y', strtotime(session('startDate')))}} To {{date('d-M-Y', strtotime(session('endDate')))}} </h4>
          
        </div>
        <div class="card-body p-0">
            
            @if (session('s_msgs')->count()!=0)
            <div class="table-responsive">
                <table class="table table-striped" id="sortable-table">
                <thead>
                    <tr>
                    
                    <th>Send To</th>
                    <th>Send By</th>
                    <th>SMS</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('s_msgs') as $msg)
                    <tr>
                       
                        <td>
                            {{$msg->user->title}} {{$msg->user->f_name}} {{$msg->user->l_name}}
                            <div class="text-success text-small font-600-bold"><i class="fas fa-mobile-alt"></i> 0{{$msg->mobile}}</div>
                        </td>
                    <td>
                        {{$msg->send_by}}
                        <div class="text-info text-small font-600-bold">{{date('d-M-Y', strtotime($msg->created_at))}}</div>
                    </td>
                   <td>
                       {{$msg->msg}}
                   </td>
                   <td>{{$msg->status}}</td>
                    </tr>
                    @endforeach
                    
                    
                </tbody>
                </table>
            </div>
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
          <div class="card">
            <div class="card-header">
              <h4>Search SMS</h4>
            </div>
            <form method="POST" action="{{route('admin_msgs_search')}}">
                @csrf
            <div class="card-body">
              
              <div class="form-group">
                <label>From</label>
                <input type="date" class="form-control" name="s_date">
              </div>
              <div class="form-group">
                <label>To</label>
                <input type="date" class="form-control" name="e_date">
              </div>
              
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary mr-1" type="submit">Submit</button>
              
            </div>
            </form>
          </div>
          
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                  <h4>Send Bulk SMS</h4>
                </div>
                <form method="POST" action="{{route('admin_msgs_bulk')}}">
                    @csrf
                <div class="card-body">
                  
                    <div class="form-group">
                        <label>Send To</label>
                        <select class="form-control" name="op">
                          <option value="1">All Teachers</option>
                          <option value="2">All Students</option>
                          <option value="3">All Staff</option>
                          <option value="4">All Users</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>SMS</label>
                        <textarea class="form-control" name="msg" ></textarea>
                    </div>
                  
                </div>
                <input type="text" name="send_by" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                <div class="card-footer text-right">
                  <button class="btn btn-success mr-1" type="submit">SEND</button>
                  
                </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/advance-table.js') }}"></script>
@endsection