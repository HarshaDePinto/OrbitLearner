@extends('layouts.think')

@section('seo')
    <title>Orbit Learner | Educational Platform | Educational Platform</title>
@endsection

@section('styles')
    <style>
        .rs-banner-section3 {
            background: url("{{ asset('storage/app/'.$abt->m_img) }}");
            background-position: center top;
            background-repeat: no-repeat;
            padding-top: 180px;
            padding-bottom: 100px;
            background-size: cover;
        }

        .bg13 {
            background-image: url("{{ asset('storage/app/'.$abt->v_img) }}");
            background-position: center;
            background-size: cover;
            padding-top: 200px;
            padding-bottom: 250px;
        }

        .bg15 {
            background-image: url("{{ asset('storage/app/'.$abt->ab_img) }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            padding-top: 100px;
            padding-bottom: 100px;
            }
    </style>
@endsection

@section('content')
    
	<div class="rs-banner-section3" >
        <div class="container">
            <div class="row align-items-center">
              <div class="col-lg-7">
              	
              </div>  
              <div class="col-lg-5 md-pt-40">
              	<div class="register-form">
              	    <div class="form-title text-center">
              	         <h4 class="title">{{$abt->m_t1}}<br>
                            {{$abt->m_t2}}</h4>
              	    </div>
              	     <div class="form-group text-center">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
              	         <form id="contact-form" class="contact-form" method="POST" action="{{ route('login') }}"
                           >
                           @csrf
              	             <div class="row">
                               
              	                 <div class="col-lg-12">
              	                         <input class="from-control" name="email" type="email" placeholder="E-Mail" id="email" required="required">
              	                 </div>
              	                 
                                   <div class="col-lg-12">
                                    <input class="from-control" name="password" type="password" placeholder="Password" id="password" required="required">
                                    </div>
                                   
                                       
              	                 <div class="col-lg-12">
              	                    <input type="submit" value="Sign In" class="wpcf7-form-control wpcf7-submit">
              	                 </div>
              	             </div>
              	         </form>
              	     </div>
              	 </div>
                </div>
            </div>
        </div>
	</div>
	
    <div class="rs-about-style8 pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 pt-40">
                    <div class="img-part">
                        <img src="{{ asset('storage/app/'.$abt->a_img1) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 pl-60 md-pt-40 md-pl-15">
                   <div class="sec-title2">
                       <span class="sub-title">About Us</span>
                       <h2 class="title pb-10">{{$abt->a_t1}}</h2>
                       <p>
                        {!!$abt->a_des1!!}
                       </p>
                       <p>
                        {!!$abt->a_des2!!}
                    </p>
                   </div>
                   
                   <div class="author-section">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="course-author">
                              <div class="align-img">
                                  <img src="{{ asset('storage/app/'.$abt->au_img) }}" alt="">
                              </div>
                              <div class="author-content">
                                  <h4 class="mb-0">{{$abt->au_name}}</h4>
                                  <p>Chairman and founder</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="signature">
                                <img src="{{ asset('storage/app/'.$abt->au_sig) }}" alt="">
                            </div>
                        </div>
                    </div>
                   </div> 
                </div>
            </div>
        </div>
    </div>
    
       <div class="rs-services rs-services-style7 pb-70">
           <div class="container">
               <div class="row">
                  <div class="col-lg-3 col-md-6 mb-30">
                    <div class="Services-wrap">
                        <div class="Services-item">
                            <div class="Services-icon">
                                <img src="{{ asset('storage/app/'.$abt->c_img) }}" alt="">
                            </div>
                            <div class="Services-desc">
                              <i class="flaticon-book-1 mb-15"></i>
                               <h4 class="services-title">
                                  <a href="#">Our Courses</a>
                               </h4> 
                            </div>
                        </div>
                    </div> 
                  </div>
                  <div class="col-lg-3 col-md-6 mb-30">
                     <div class="Services-wrap">
                         <div class="Services-item">
                             <div class="Services-icon">
                                 <img src="{{ asset('storage/app/'.$abt->t_img) }}" alt="">
                             </div>
                             <div class="Services-desc">
                               <i class="flaticon-book mb-15"></i>
                                <h4 class="services-title">
                                   <a href="{{route('teachers')}}">Certified Teachers</a>
                                </h4> 
                             </div>
                         </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-30">
                     <div class="Services-wrap">
                         <div class="Services-item">
                             <div class="Services-icon">
                                 <img src="{{ asset('storage/app/'.$abt->cl_img) }}" alt="">
                             </div>
                             <div class="Services-desc">
                               <i class="flaticon-book mb-15"></i>
                                <h4 class="services-title">
                                   <a href="{{route('classes')}}">Our Classes</a>
                                </h4> 
                             </div>
                         </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-6 mb-30">
                      <div class="Services-wrap">
                          <div class="Services-item">
                              <div class="Services-icon">
                                  <img src="{{ asset('storage/app/'.$abt->g_img) }}" alt="">
                              </div>
                              <div class="Services-desc">
                                <i class="flaticon-tool-2"></i>
                                 <h4 class="services-title mb-15">
                                    <a href="#">Gallery</a>
                                 </h4> 
                              </div>
                          </div>
                      </div>
                  </div>
               </div>
           </div>
       </div>
       

        <div id="rs-courses" class="rs-courses sec-color sec-spacer">
            <div class="container">
                <div class="sec-title mb-50 text-center">
                    <h2>OUR POPULAR Classes</h2>      
                    <p>Fusce sem dolor, interdum in fficitur at, faucibus nec lorem. Sed nec molestie justo.</p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="3" data-md-device-nav="true" data-md-device-dots="true">
                            @foreach ($groups as $group)
                            <div class="cource-item">
                                <div class="cource-img">
                                    @if ($group->img1)
                                        <img src="{{ asset('storage/app/'.$group->img1) }}" alt="" />
                                    @else
                                        <img src="{{ asset('public/front/images/cThu.jpg') }}" alt="" />
                                    @endif
                                    
                                    <a class="image-link" href="{{route('class_single',$group->id)}}" title="{{$group->grade->title}}">
                                        <i class="fa fa-link"></i>
                                    </a>
                                    
                                </div>
                                <div class="course-body">
                                    <a href="{{route('class_single',$group->id)}}" class="course-category">{{$group->grade->title}}</a>
                                    <h4 class="course-title"><a href="{{route('class_single',$group->id)}}">{{$group->title}}</a></h4>
                                    <div class="review-wrap">
                                     
                                        <span class="review">{{$group->user->title}} {{$group->user->f_name}} {{$group->user->l_name}}</span>
                                    </div>
                                    <div class="course-desc">
                                       
                                    </div>
                                </div>
                                <div class="course-footer">
                                    {!!$group->des1!!}
                                </div>
                            </div>
                            @endforeach
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

       
        <div id="rs-team-style8" class="rs-team-style8 sec-spacer">
            <div class="blue-overlay"></div>
                <div class="container">
                  <div class="sec-title2 mb-50 text-left">
                  	   <span class="title">Our Teacherd</span>
                         <h2 class="title"> Meet Our Expert Teacher</h2> 
                  </div>
          				<div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="false" data-autoplay-timeout="5000" data-smart-speed="1200" data-dots="true" data-nav="true" data-nav-speed="false" data-mobile-device="1" data-mobile-device-nav="true" data-mobile-device-dots="true" data-ipad-device="2" data-ipad-device-nav="true" data-ipad-device-dots="true" data-md-device="4" data-md-device-nav="true" data-md-device-dots="true">
                              @foreach ($teachers as $teacher)
                                <div class="item">
                                    <div class="item-team">
                                        <div class="team-img">
                                            <img src="{{ asset('storage/app/'.$teacher->image) }}" alt="">
                                            
                                        </div>
                                        <div class="team-content">
                                            <h3 class="team-name"><a href="{{route('teacher_single',$teacher->id)}}">{{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}</a></h3>
                                            <span class="sub-title">{!!$teacher->des!!}</span>
                                        </div>
                                    </div>
                                </div> 
                              @endforeach
                             
                            
          	    </div>
			</div>
		</div>
            
        

        <!-- About Start -->
        <div class="rs-about-style8 bg13">
            <div class="container">
                <div class="content-part text-center">
                    <h2 class="title pb-20">{{$abt->v_tit}}</h2>
                    <div class="play-btn">
                       <a class="pulse-btn popup-youtube" href="{{$abt->v_link}}"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
     
        <!-- Latest News Start -->
        


        <!-- ABOUT Section End -->
        <div class="rs-our-best bg15 md-gray-bg-color">
        	<div class="container">
        		<div class="row">
        			<div class="col-lg-6">
        				
        			</div>
        			<div class="col-lg-6">
        				<div class="rs-calltoaction">
        					   <span class="sub-title">{{$abt->ab_t1}}</span>
        				       <h2 class="title pb-10">{{$abt->ab_t2}}</h2>
        				       <p class="desc pb-30">
                                {!!$abt->ab_des1!!}
        				       </p>
        				       <div class="btn-part">
        				       		<a class="readon2" href="#">Join with us</a>
        				       </div> 
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- ABOUT Section End -->

@endsection

@section('scripts')
    
@endsection