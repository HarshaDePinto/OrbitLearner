@extends('layouts.admin')

@section('styles')
<title>{{$zAcc->title}}</title>
@endsection

@section('content')
<a href="#"><h5>{{$zAcc->title}}</h5></a>
<div class="text-dark text-small font-600-bold"><b>Updated By: {{$zAcc->author}} <br> {{$zAcc->updated_at->diffForHumans()}}</b></div>
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{route('zoom_account_update',$zAcc->id)}}">
                @csrf
                @method('PUT')
                
                
                <div class="row">
                    
                    <div class="form-group col-md-6 col-12">
                        <label>Account Title</label>
                        <input type="text" class="form-control" name="title" value="{{$zAcc->title}}">
                        
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Account Email</label>
                        <input type="text" class="form-control" name="email" value="{{$zAcc->email}}">
                        
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Account Api Key</label>
                        <input type="text" class="form-control" name="key" value="{{$zAcc->key}}">
                        
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Account Api Secret</label>
                        <input type="text" class="form-control" name="secret" value="{{$zAcc->secret}}">
                        
                    </div>
                    
                    
                </div>
                <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                <div class="card-footer pt-0 text-right">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
            <div class="card-footer pt-0 text-left">
                <form method="POST" enctype="multipart/form-data" action="{{route('delete_zoom_account')}}">
                    <input type="text" name="id" value="{{$zAcc->id}}" hidden>
                    @csrf
                    <button type="submit" class="btn btn-danger text-white">Delete</button>
                </form>
            </div>
            
        </div>
      </div>
      
    </div>
   
</div>

    
    
    
@endsection

@section('scripts')

@endsection