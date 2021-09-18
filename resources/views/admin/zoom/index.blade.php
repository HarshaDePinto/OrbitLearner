@extends('layouts.admin')
@section('styles')
<title>Zoom Accounts</title>
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.css') }}">
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Zoom Accounts</h4>
          <div class="card-header-action">
            
              <div class="input-group">
              
                <div class="input-btn">
                   <a href="#addGrade" class="btn btn-sm btn-success">Add An Account</a>
                </div>
                
              </div>
            
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped" id="sortable-table">
              <thead>
                <tr>
                  <th class="text-center">
                    <i class="fas fa-th"></i>
                  </th>
                  <th>Title</th>
                  <th>Email</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($zAccounts as $za)
                <tr>
                  <td>
                    <div class="sort-handler">
                      <i class="fas fa-th"></i>
                    </div>
                  </td>
                  <td>
                    {{$za->title}}
                  </td>
                  <td>
                    {{$za->email}}
                  </td>
                  
                  <td><a href="{{route('zoom_account_single',$za->id)}}" class="btn btn-primary btn-sm">Edit</a></td>
                  
                </tr>
                @endforeach
                
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row" id="addGrade">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            
            <div class="card-header">
            <h4>Add An Zoom Account</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('create_zoom_account')}}">
                    @csrf
                    <div class="form-group">
                        <label>Account Title</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label>Account Email</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Account Api Key</label>
                        <input type="text" class="form-control" name="key" required>
                    </div>
                    <div class="form-group">
                        <label>Account Api Secret</label>
                        <input type="text" class="form-control" name="secret" required>
                    </div>

                    <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            
            </div>
        </div>
       
     
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/advance-table.js') }}"></script>
<script src="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.js') }}"></script>

@endsection