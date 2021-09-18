

<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  
 
  <link rel="stylesheet" href="{{ asset('public/back/assets/css/back.css') }}">
  @yield('styles')
  <link rel='icon'  href='{{ asset('public/front/images/icon.png') }}' />
</head>

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
         
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 
              @if (Auth::user()->image)
              <img alt="image" src="{{ asset('storage/app/'.Auth::user()->image) }}"
              class="user-img-radious-style">  
              @else
              <img alt="image" src="{{ asset('public/back/assets/img/admin.png') }}"
              class="user-img-radious-style"> 
              @endif
                <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hi {{Auth::user()->title}} {{Auth::user()->f_name}}</div>
              <a href="{{route('admin_profile',Auth::user()->id)}}" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              
              
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
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home') }}"> <img alt="image" src="{{ asset('public/front/images/logo-white.png') }}" class="header-logo" /> <span
                class="logo-name">Admin</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Control Panel</li>
            <li class="dropdown {{request()->route()->getName() === 'admin_home' ? ' active' : ''}}">
              <a href="{{route('admin_home')}}" class="nav-link"><i data-feather="compass"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{request()->route()->getName() === 'admin_teachers' ? ' active' : ''}}">
              <a href="{{route('admin_teachers')}}" class="nav-link"><i data-feather="users"></i><span>Teachers</span></a>
            </li>
            <li class="dropdown {{request()->route()->getName() === 'admin_students' ? ' active' : ''}}">
              <a href="{{route('admin_students')}}" class="nav-link"><i data-feather="users"></i><span>Students</span></a>
            </li>
            @if (request()->route()->getName() === 'admin_teacher_batches' || request()->route()->getName() === 'admin_teacher_group_tutorial'|| request()->route()->getName() === 'admin_teacher_group_video'|| request()->route()->getName() === 'admin_teacher_group_mcq'|| request()->route()->getName() === 'admin_teacher_group_essay')
            
            <li class="dropdown active">
              <a href="{{route('admin_teacher_groups',$group->user_id)}}" class="nav-link"><i
                data-feather="chevrons-left"></i><span>Back To Courses</span></a>
            </li>
           
            @endif
            @if (request()->route()->getName() === 'admin_teacher_batch_single' || request()->route()->getName() === 'admin_teacher_batch_online' || request()->route()->getName() === 'admin_teacher_batch_students'|| request()->route()->getName() === 'admin_teacher_batch_tutorial' ||request()->route()->getName() === 'admin_teacher_batch_video'||request()->route()->getName() === 'admin_teacher_batch_mcq'||request()->route()->getName() === 'admin_teacher_batch_essay'||request()->route()->getName() === 'admin_teacher_batch_essay')
            
            <li class="dropdown active">
              <a href="{{route('admin_teacher_batches',$batch->group_id)}}" class="nav-link"><i
                data-feather="chevrons-left"></i><span>Back To Batches</span></a>
            </li>
           
            @endif

            @if (request()->route()->getName() === 'admin_teacher_group_tutorial_s')
            
            <li class="dropdown active">
              <a href="{{route('admin_teacher_group_tutorial',$tutorial->group_id)}}" class="nav-link"><i
                data-feather="chevrons-left"></i><span>Back To Tutorials</span></a>
            </li>
           
            @endif
            @if (request()->route()->getName() === 'admin_teacher_group_video_s')
            
            <li class="dropdown active">
              <a href="{{route('admin_teacher_group_video',$video->group_id)}}" class="nav-link"><i
                data-feather="chevrons-left"></i><span>Back To Videos</span></a>
            </li>
           
            @endif
            @if (request()->route()->getName() === 'admin_teacher_group_mcq_s')
            
            <li class="dropdown active">
              <a href="{{route('admin_teacher_group_mcq',$mcq->group_id)}}" class="nav-link"><i
                data-feather="chevrons-left"></i><span>Back To MCQs</span></a>
            </li>
           
            @endif
            @if (request()->route()->getName() === 'admin_teacher_group_single')
            
            <li class="dropdown">
              <a href="{{route('admin_teacher_single',$group->user_id)}}" class="nav-link"><i
                data-feather="user"></i><span>{{$group->user->title}} {{$group->user->f_name}}</span></a>
            </li>
           
            @endif
            @if (request()->route()->getName() === 'admin_teacher_groups')
            
            <li class="dropdown">
              <a href="{{route('admin_teacher_single',$teacher->id)}}" class="nav-link"><i
                data-feather="user"></i><span>{{$teacher->title}} {{$teacher->f_name}}</span></a>
            </li>
           
            @endif
            @if (request()->route()->getName() === 'admin_teacher_groups'|| request()->route()->getName() === 'admin_teacher_single')
            
            <li class="dropdown {{request()->route()->getName() === 'admin_teacher_groups' ? ' active' : ''}}">
              <a href="{{route('admin_teacher_groups',$teacher->id)}}" class="nav-link"><i
                data-feather="grid"></i><span>All Courses</span></a>
            </li>
           
            @endif
            @if (request()->route()->getName() === 'admin_teachers'|| request()->route()->getName() === 'admin_teachers_add' || request()->route()->getName() === 'admin_teacher_single')
            
            <li class="dropdown {{request()->route()->getName() === 'admin_teachers_add' ? ' active' : ''}}">
              <a href="{{route('admin_teachers_add')}}" class="nav-link"><i
                data-feather="user-plus"></i><span>Add A Teacher</span></a>
            </li>
           
            @endif
            @if (request()->route()->getName() === 'admin_profile')
            <li class="dropdown active">
              <a href="{{route('admin_profile',Auth::user()->id)}}" class="nav-link"><i
                data-feather="user-check"></i><span>Profile</span></a>
            </li>
            @endif
            @if (request()->route()->getName() === 'admin_home' || request()->route()->getName() === 'admin_grades'|| request()->route()->getName() === 'admin_grade_single')
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="disc"></i><span>Grades</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('admin_grades')}}">All Grades</a></li>
                @foreach ($grades as $grade)
                <li><a class="nav-link" href="{{route('admin_grade_single',$grade->id)}}">{{$grade->title}}</a></li>
                @endforeach
                
              </ul>
            </li>
            @endif
            @if (request()->route()->getName() === 'admin_home' || request()->route()->getName() === 'admin_subjects'|| request()->route()->getName() === 'admin_subject_single')
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="book"></i><span>Subjects</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('admin_subjects')}}">All Subjects</a></li>
                @foreach ($subjects as $subject)
                <li><a class="nav-link" href="{{route('admin_subject_single',$subject->id)}}">{{$subject->title}}</a></li>
                @endforeach
                
              </ul>
            </li>
            @endif

            <li class="dropdown {{request()->route()->getName() === 'admin_accountants' ? ' active' : ''}}">
              <a href="{{route('admin_accountants')}}" class="nav-link"><i data-feather="sidebar"></i><span>Accountants</span></a>
            </li>
            @if (request()->route()->getName() === 'admin_accountants'|| request()->route()->getName() === 'admin_accountant_create' || request()->route()->getName() === 'admin_accountant_single')
            
            <li class="dropdown {{request()->route()->getName() === 'admin_accountant_create' ? ' active' : ''}}">
              <a href="{{route('admin_accountant_create')}}" class="nav-link"><i
                data-feather="user-plus"></i><span>Add An Accountant</span></a>
            </li>
           
            @endif
            <li class="dropdown {{request()->route()->getName() === 'admin_designers' ? ' active' : ''}}">
              <a href="{{route('admin_designers')}}" class="nav-link"><i data-feather="feather"></i><span>Designers</span></a>
            </li>
            @if (request()->route()->getName() === 'admin_designers'|| request()->route()->getName() === 'admin_designer_create' || request()->route()->getName() === 'admin_designer_single')
            
            <li class="dropdown {{request()->route()->getName() === 'admin_designer_create' ? ' active' : ''}}">
              <a href="{{route('admin_designer_create')}}" class="nav-link"><i
                data-feather="user-plus"></i><span>Add A Designer</span></a>
            </li>
           
            @endif
            <li class="dropdown {{request()->route()->getName() === 'admin_msgs' ? ' active' : ''}}">
              <a href="{{route('admin_msgs')}}" class="nav-link"><i data-feather="message-square"></i><span>SMS</span></a>
            </li>
            <li class="dropdown {{request()->route()->getName() === 'zoom_accounts' ? ' active' : ''}}">
              <a href="{{route('zoom_accounts')}}" class="nav-link"><i data-feather="video"></i><span>Zoom Accounts</span></a>
            </li>
            <li class="dropdown {{request()->route()->getName() === 'admin_delete_log' ? ' active' : ''}}">
              <a href="{{route('admin_delete_log')}}" class="nav-link"><i data-feather="delete"></i><span>Deleted</span></a>
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
        @if ($errors->any())
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger alert-has-icon">
            <div class="alert-icon"><i class="
              fas fa-exclamation-triangle"></i></div>
            <div class="alert-body">
              <div class="alert-title">{{ $error }}</div>
              
            </div>
          </div>
                                       
          @endforeach
                             
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
          <div class="section-body">
            @yield('content')
          </div>
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
 
  <script src="{{ asset('public/back/assets/js/back.js') }}"></script>
  @yield('scripts')
</body>



</html>
