@extends('layouts.admin')
@section('styles')
<title>Create A Teacher</title>
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-12 col-md-6 col-lg-6">
        
        <div class="card">
            
            <div class="card-header">
            <h4>Teacher's Details</h4>
            @if ($errors->any())
            
                <div class="alert alert-danger alert-has-icon">
                    @foreach ($errors->all() as $error)
                    <div class="alert-icon"><i class="
                        fas fa-exclamation-triangle"></i></div>
                    <div class="alert-body">
                    <div class="alert-title">{{ $error }}</div>
                    
                    </div>
                    @endforeach
                </div>
            @endif
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin_teachers_create')}}">
                    @csrf
                    
                    <div class="form-group">
                        <label>Title</label>
                        <select name="title" class="form-control select2">
                            <option value="Mr.">Mr.</option>
                            <option value="Ms.">Ms.</option>
                            <option value="Miss.">Miss.</option>
                            <option value="Mrs.">Mrs.</option>
                            <option value="Dr.">Dr.</option>
                            <option value="Prof.">Prof.</option>
                            <option value="Rev.">Rev.</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="f_name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="l_name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Gender</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="gender" value="1" class="selectgroup-input-radio" required>
                            <span class="selectgroup-button">Male</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="gender" value="2" class="selectgroup-input-radio">
                            <span class="selectgroup-button">Female</span>
                          </label>
                          
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Work Place</label>
                        <input type="text" class="form-control" name="school" required>
                    </div>
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" maxlength="10" class="form-control" name="mobile" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Max advanced</label>
                        <input type="number" class="form-control" name="max_advanced">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Is Welfare Teacher?</label>
                        <div class="selectgroup w-100">
                          <label class="selectgroup-item">
                            <input type="radio" name="welfare_teachers" value="1" class="selectgroup-input-radio" required>
                            <span class="selectgroup-button">Yes</span>
                          </label>
                          <label class="selectgroup-item">
                            <input type="radio" name="welfare_teachers" value="0" class="selectgroup-input-radio">
                            <span class="selectgroup-button">No</span>
                          </label>
                          
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control summernote-simple" name="address">
                           
                        </textarea>
                    
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control summernote-simple" name="des">
                           
                        </textarea>
                    
                    </div>
                    <div class="form-group">
                        <label>Image 500x500</label>
                        
                        <input type="file" class="form-control" id="image" name="image" required>
                    
                    </div>
                    

                    <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            
            </div>
        </div>
        
     
    </div>
    
</div>

@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('public/back/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/forms-advanced-forms.js') }}"></script>
@endsection