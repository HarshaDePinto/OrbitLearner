@extends('layouts.admin')
@section('styles')
<title>{{$admin->title}} {{$admin->f_name}} {{$admin->l_name}}</title>
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
                @if ($admin->image)
                <img alt="image" src="{{ asset('storage/app/'.$admin->image) }}" class="rounded-circle author-box-picture">  
                 @else
                 @if ($admin->gender==1)
                 <img alt="image" src="{{ asset('public/back/assets/img/admin.png') }}" class="rounded-circle author-box-picture">
                 @endif
                 @if ($admin->gender==2)
                 <img alt="image" src="{{ asset('public/back/assets/img/adminf.png') }}" class="rounded-circle author-box-picture">
                 @endif
                 
                
                @endif
              
              <div class="clearfix"></div>
              <div class="author-box-name">
                <a href="#">{{$admin->title}} {{$admin->f_name}} {{$admin->l_name}}</a>
              </div>
              <div class="author-box-job">{{$admin->role->name}}</div>
            </div>
            
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <h4>Personal Details</h4>
          </div>
          <div class="card-body">
            <div class="py-4">
              <p class="clearfix">
                <span class="float-left">
                  Birthday
                </span>
                <span class="float-right text-muted">
                    {{$admin->b_day}}
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Mobile
                </span>
                <span class="float-right text-muted">
                    0{{$admin->mobile}}
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Mail
                </span>
                <span class="float-right text-muted">
                    {{$admin->email}}
                </span>
              </p>
             
              
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
                  aria-selected="true">Edit</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                  aria-selected="false">Change Password</a>
              </li>
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin_profile_update',$admin->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="form-group col-md-3 col-12">
                            <label>Title</label>
                            <select class="form-control" name="title">
                              <option value="{{$admin->title}}">{{$admin->title}}</option>
                              <option value="Mr.">Mr.</option>
                              <option value="Ms.">Ms.</option>
                              <option value="Miss.">Miss.</option>
                              <option value="Mrs.">Mrs.</option>
                              <option value="Dr.">Dr.</option>
                              <option value="Prof.">Prof.</option>
                              <option value="Rev.">Rev.</option>
                            </select>
                           
                        </div>
                        <div class="form-group col-md-4 col-12">
                          <label>First Name</label>
                          <input type="text" class="form-control" name="f_name" value="{{$admin->f_name}}">
                         
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="l_name" value="{{$admin->l_name}}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" value="{{$admin->email}}">
                          
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>Mobile</label>
                          <input type="text" class="form-control" name="mobile" value="{{$admin->mobile}}">
                          
                      </div>
                        <div class="form-group col-md-12 col-12">
                            <label>Company</label>
                            <input type="text" class="form-control" name="school" value="{{$admin->school}}">
                            
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label class="form-label">Gender</label>
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="gender" value="1" class="selectgroup-input-radio"
                                @if ($admin->gender==1)
                                checked
                                @endif
                                >
                                <span class="selectgroup-button">Male</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="gender" value="2" class="selectgroup-input-radio" 
                                @if ($admin->gender==2)
                                checked
                                @endif
                                >
                                <span class="selectgroup-button">Female</span>
                              </label>
                              
                            </div>
                        </div>
                        <div class="form-group col-md-5 col-12">
                            <label>Birthday</label>
                            <input type="text" class="form-control" name="b_day" value="{{$admin->b_day}}">
                            
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Contact</label>
                            <textarea
                              class="form-control summernote-simple" name="contact">{{$admin->contact}}</textarea>
                          </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Address</label>
                          <textarea
                            class="form-control summernote-simple" name="address">{{$admin->address}}</textarea>
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="image">Profile Picture</label>
                            
                            
                                <input type="file" class="form-control" id="image" name="image" value="{{ $admin->image}}" >
                                
                                                    
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
              </div>
              <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                <form method="POST" action="{{ route('change_password') }}">
                    @csrf
                   
                    <div class="card-header">
                      <h4>Change Password</h4>
                    </div>
                    <div class="card-body">
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-has-icon">
                            <div class="alert-icon"><i class="
                              fas fa-exclamation-triangle"></i></div>
                            <div class="alert-body">
                              <div class="alert-title">{{ $error }}</div>
                              
                            </div>
                          </div>
                        
                        @endforeach 
                      <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>Current Password</label>
                          <input type="password" class="form-control" name="current_password" required>
                          
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>New Password</label>
                          <input type="password" class="form-control" name="new_password" required>
                          
                        </div>
                        
                      </div>
                      <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>New Confirm Password</label>
                          <input type="password" class="form-control" name="new_confirm_password" required>
                          
                        </div>
                        
                      </div>
                      
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-success">Update Password</button>
                    </div>
                </form>
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
@endsection