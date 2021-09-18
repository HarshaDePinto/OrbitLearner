<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Orbit Learner | Designer Panel</title>
  <link rel="icon" href="{{ asset('public/front/images/icon.png') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('public/back/assets/css/back.css') }}">

  @yield('styles')
 
</head>

    
@auth
@if (Auth::user()->id== $designer->id)
<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
              @yield('search')
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          
         
          <li class="dropdown">
            <a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
              @if ($designer->image)
              <img alt="image" src="{{ asset('storage/app/'.$designer->image) }}"
              class="user-img-radious-style">  
              @else
              @if ($designer->gender==1)
              <img alt="image" src="{{ asset('public/back/assets/img/admin.jpg') }}"
              class="user-img-radious-style"> 
              @endif
              @if ($designer->gender==2)
              <img alt="image" src="{{ asset('public/back/assets/img/adminf.jpg') }}"
              class="user-img-radious-style"> 
              @endif
              @endif
              
                <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hi {{$designer->title}} {{$designer->f_name}}</div>
                <a href="{{route('designer_profile',Auth::user()->id)}}" class="dropdown-item has-icon"> 
                    <i class="far fa-user"></i> Profile
                </a> 
              
              <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

               
                <a href="route('logout')" class="dropdown-item has-icon text-danger" onclick="event.preventDefault();
                this.closest('form').submit();"> <i class="fas fa-sign-out-alt"></i>
                    Logout
                  </a>
                </form>
             
            </div>
          </li>
        </ul>
      </nav>
      {{-- Side Bar --}}
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="{{ route('home') }}"> <img alt="image" src="{{ asset('public/front/images/logo-white.png') }}" class="header-logo" /> <span
                    class="logo-name">Designer</span>
                </a>
            </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Designer Panel</li>

            <li class="dropdown {{request()->route()->getName() === 'designer_home' ? ' active' : ''}}">
              <a href="{{route('designer_home',$designer->id)}}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{request()->route()->getName() === 'designer_web' ? ' active' : ''}}">
                <a href="{{route('designer_web',$designer->id)}}" class="nav-link"><i data-feather="feather"></i><span>Website</span></a>
            </li>
            
           
          
           
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        @if (session()->has('success'))
        <div class="alert alert-success alert-has-icon">
          <div class="alert-icon"><i class="
            fas fa-check"></i></div>
          <div class="alert-body">
            <div class="alert-title">{{session()->get('success')}}</div>
            
          </div>
        </div>
        @endif
        
        @if (session()->has('info'))
        <div class="alert alert-info alert-has-icon">
          <div class="alert-icon"><i class="
            far fa-lightbulb"></i></div>
          <div class="alert-body">
            <div class="alert-title">{{session()->get('info')}}</div>
            
          </div>
        </div>
        
        @endif
        
        @if (session()->has('danger'))
        <div class="alert alert-danger alert-has-icon">
          <div class="alert-icon"><i class="
            fas fa-exclamation-triangle"></i></div>
          <div class="alert-body">
            <div class="alert-title">{{session()->get('danger')}}</div>
            
          </div>
        </div>
       
        @endif
        @if (session()->has('warning'))
        <div class="alert alert-warning alert-has-icon">
          <div class="alert-icon"><i class="
            fas fa-exclamation"></i></div>
          <div class="alert-body">
            <div class="alert-title">{{session()->get('warning')}}</div>
            
          </div>
        </div>
        
        @endif
        
        <section class="section">
          @yield('content')
          
          
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
            Copyright &copy; {{date('Y')}} <a href="http://www.z-techdigital.com/" target="_blank">Z Tech Digital (Pvt) Ltd</a>.
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{ asset('public/back/assets/js/back.js') }}"></script>
  
  @yield('scripts')
</body>  
@else
<h1 style="color: red">
    You Don't Have The Acces To This Page!
    </h1>
@endif
@endauth