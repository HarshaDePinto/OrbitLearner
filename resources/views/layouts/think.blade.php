<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="utf-8">
        
        @yield('seo')
        
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel='icon'  href='{{ asset('public/front/images/icon.png') }}' />
       
		
        <link rel="stylesheet" type="text/css" href="{{ asset('public/front/css/front.css') }}">
		
        
        <link rel="stylesheet" type="text/css" href="{{ asset('public/front/css/rsmenu-main.css') }}">
      
        <link rel="stylesheet" type="text/css" href="{{ asset('public/front/css/rsmenu-transitions.css') }}">
        
        
        <link rel="stylesheet" type="text/css" href="{{ asset('public/front/css/front2.css') }}">
        <script src="https://use.fontawesome.com/e0fc76e1e3.js"></script>
        @yield('styles')
       
        <style>
            .bg3 {
                background-image: url("{{ asset('public/front/images/bg/counter-bg.jpg') }}");
                background-size: cover;
                background-attachment: fixed;
                background-position: center top;
                }
        </style>
    </head>
    <body class="home1">
        
		
   <!--Full width header Start-->
   <div class="full-width-header">
       
   
    <header id="rs-header" class="rs-header rs-transfarent-header-style rs-header-style8 lg-pt-20">
        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-12">
                        <div class="logo-area">
                            <a href="#"><img width="80px" src="{{ asset('public/front/images/logo-white.png') }}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12">
                        <div class="main-menu text-center">
                            
                            <a class="rs-menu-toggle"><i class="fa fa-bars"></i>Menu</a>
                            <nav class="rs-menu">
                                <ul class="nav-menu">
                                    
                                    <li class="{{request()->route()->getName() === 'home' ? ' current_page_item' : ''}}"> <a href="{{route('home')}}" class="home">Home</a>
                                        
                                    </li>
                                 
                                    <li class="{{request()->route()->getName() === 'classes' ? ' current_page_item' : ''}}"> 
                                        <a href="{{route('classes')}}">Classes</a>
                                       
                                    </li>
                                    <li class="{{request()->route()->getName() === 'teachers' ? ' current_page_item' : ''}}"> 
                                        <a href="{{route('teachers')}}">Teachers</a>
                                       
                                    </li>
                                    <li class="{{request()->route()->getName() === 'about_us' ? ' current_page_item' : ''}}"> 
                                        <a href="{{route('about_us')}}">About Us</a>
                                       
                                    </li>
                                    <li class="{{request()->route()->getName() === 'privacy_policy' ? ' current_page_item' : ''}}"> 
                                        <a href="{{route('privacy_policy')}}">Privacy</a>
                                       
                                    </li>
                                    <li class="{{request()->route()->getName() === 'refund_policy' ? ' current_page_item' : ''}}"> 
                                        <a href="{{route('refund_policy')}}">Refund</a>
                                       
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="rs-right-btn-inner text-right">
                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        @if (Auth::user()->role_id==1 && Auth::user()->is_active==1)
                                        <div class="apply-box">
                                            <a href="{{route('admin_home')}}">Admin</a>
                                        </div>
                                        @endif
                                        @if (Auth::user()->role_id==1 && Auth::user()->is_active==0)
                                        <div class="apply-box">
                                            <a href="{{route('mobile_verification')}}">Verification</a>
                                        </div>
                                        @endif
                                        @if (Auth::user()->role_id==4 && Auth::user()->is_active==1)
                                        <div class="apply-box">
                                            <a href="{{route('student_home',Auth::user()->id)}}">Student</a>
                                        </div>
                                        @endif
                                        @if (Auth::user()->role_id==4 && Auth::user()->is_active==0)
                                        <div class="apply-box">
                                            <a href="{{route('mobile_verification')}}">Verification</a>
                                        </div>
                                        @endif
                                        @if (Auth::user()->role_id==5 && Auth::user()->is_active==1)
                                        <div class="apply-box">
                                            <a href="{{route('finance_home',Auth::user()->id)}}">Accountant</a>
                                        </div>
                                        @endif

                                        @if (Auth::user()->role_id==6 && Auth::user()->is_active==1)
                                        <div class="apply-box">
                                            <a href="{{route('designer_home',Auth::user()->id)}}">Designer</a>
                                        </div>
                                        @endif
                                        
                                    @else
                                    
                                    @if (Route::has('register'))
                                    <div class="apply-box">
                                        <a href="{{ route('register') }}">Register</a>
                                    </div>
                                    
                                    @endif
                
                                      
                                    @endauth
                                </div>
                                @endif
                                
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->
    </header>
  

   </div>
   <!--Full width header End-->
   @yield('content')
       
        <!-- Footer Start -->
        <footer id="rs-footer" class="bg3 rs-footer rs-footer-style8">
			<div class="container">
				<!-- Footer Address -->
				<div>
					<div class="row footer-contact-desc">
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-map-marker"></i>
								<h4 class="contact-title">Address</h4>
								<p class="contact-desc text-white">
									215/1/3,Thalawathugoda road, <br>
                                    Hokandara, Sri Lanka.
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-phone"></i>
								<h4 class="contact-title">Phone Number</h4>
								<p class="contact-desc text-white">
									0112562763 <br>
                                    0114388281
								</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-inner">
								<i class="fa fa-map-marker"></i>
								<h4 class="contact-title">Email Address</h4>
								<p class="contact-desc text-white">
									info@orbitlearner.com <br>
                                    reg@orbitlearner.com
								</p>
							</div>
						</div>
					</div>					
				</div>
			</div>
			
			<!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="about-widget">
                                <img width="80px" src="{{ asset('public/front/images/logo-white.png') }}" alt="Footer Logo">
                                <p>Orbit Learner is Sri Lanka's state-of-the-art online education system which presents proudly and achieves quality educational outcomes for the future success of education in the country.</p>
                                
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-12">
                            <h5 class="footer-title">OUR SITEMAP</h5>
                            <ul class="sitemap-widget">
                                <li class="active"><a href="{{route('home')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Home</a></li>
                                
                                <li><a href="{{route('classes')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Classes</a></li>
                                <li><a href="{{route('teachers')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Teachers</a></li>
                                <li><a href="{{route('about_us')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>About Us</a></li>
                                <li><a href="{{route('privacy_policy')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Privacy Policy</a></li>
                                <li><a href="{{route('refund_policy')}}"><i class="fa fa-angle-right" aria-hidden="true"></i>Refund Policy</a></li>
                               
                            </ul>
                        </div>
                        
                    </div>
                    <div class="footer-share">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-vimeo"></i></a></li>    
                        </ul>
                    </div>                                
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="copyright">
                        <p> Copyright &copy; {{date('Y')}} <a href="http://www.z-techdigital.com/" target="_blank">Z Tech Digital (Pvt) Ltd</a>.</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp">
            <i class="fa fa-angle-up"></i>
        </div>
		
	
        
      
        
       
        <script src="{{ asset('public/front/js/front.js') }}"></script>
        @yield('scripts')
    </body>
</html>