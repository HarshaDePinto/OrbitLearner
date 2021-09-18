@extends('layouts.teacher')
@section('styles')
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
                @if ($teacher->image)
                <img alt="image" src="{{ asset('storage/app/'.$teacher->image) }}" class="rounded-circle author-box-picture">  
                 @else
                 @if ($teacher->gender==1)
                 <img alt="image" src="{{ asset('public/back/assets/img/admin.jpg') }}" class="rounded-circle author-box-picture">
                 @endif
                 @if ($teacher->gender==2)
                 <img alt="image" src="{{ asset('public/back/assets/img/adminf.jpg') }}" class="rounded-circle author-box-picture">
                 @endif
                 
                
                @endif
              
              <div class="clearfix"></div>
              <div class="author-box-name">
                <a href="#">{{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}</a>
              </div>
              <div class="author-box-job">{{$teacher->role->name}}</div>
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
                    {{$teacher->b_day}}
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Mobile
                </span>
                <span class="float-right text-muted">
                    0{{$teacher->mobile}}
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Mail
                </span>
                <span class="float-right text-muted">
                    {{$teacher->email}}
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
                <form method="POST" enctype="multipart/form-data" action="{{route('admin_profile_update',$teacher->id)}}">
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
                              <option value="{{$teacher->title}}">{{$teacher->title}}</option>
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
                          <input type="text" class="form-control" name="f_name" value="{{$teacher->f_name}}">
                         
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>Last Name</label>
                          <input type="text" class="form-control" name="l_name" value="{{$teacher->l_name}}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-7 col-12">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" value="{{$teacher->email}}">
                          
                        </div>
                        <div class="form-group col-md-5 col-12">
                          <label>Mobile</label>
                          <input type="text" class="form-control" name="mobile" value="{{$teacher->mobile}}">
                          
                      </div>
                        <div class="form-group col-md-12 col-12">
                            <label>Company</label>
                            <input type="text" class="form-control" name="school" value="{{$teacher->school}}">
                            
                        </div>
                        <div class="form-group col-md-6 col-12">
                            <label class="form-label">Gender</label>
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="gender" value="1" class="selectgroup-input-radio"
                                @if ($teacher->gender==1)
                                checked
                                @endif
                                >
                                <span class="selectgroup-button">Male</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="gender" value="2" class="selectgroup-input-radio" 
                                @if ($teacher->gender==2)
                                checked
                                @endif
                                >
                                <span class="selectgroup-button">Female</span>
                              </label>
                              
                            </div>
                        </div>
                        <div class="form-group col-md-5 col-12">
                            <label>Birthday</label>
                            <input type="text" class="form-control" name="b_day" value="{{$teacher->b_day}}">
                            
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label>Contact</label>
                            <textarea
                              class="form-control summernote-simple" name="contact">{{$teacher->contact}}</textarea>
                          </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Address</label>
                          <textarea
                            class="form-control summernote-simple" name="address">{{$teacher->address}}</textarea>
                        </div>
                        <div class="form-group col-md-12 col-12">
                            <label>Description Small</label>
                            <textarea
                              class="form-control summernote-simple" name="des">{!!$teacher->des!!}</textarea>
                          </div>
                          <div class="form-group col-md-12 col-12">
                            <label>Description Main</label>
                            <textarea
                              class="form-control summernote-simple" name="des2">{!!$teacher->des2!!}</textarea>
                          </div>
                      </div>
                     
                      <div class="row">
                        <div class="form-group col-md-6 col-12">
                            <label for="image">Profile Picture</label>
                            
                            
                                <input type="file" class="form-control" id="image" name="image" value="{{ $teacher->image}}" >
                                
                                                    
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