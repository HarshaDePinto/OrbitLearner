@extends('layouts.think')

@section('seo')
    <title>Orbit Learner | Educational Platform | Educational Platform</title>
@endsection

@section('styles')
    <style>
       

        .bg7 {
            background-image: url("{{ asset('public/front/images/bg/bg3.jpg') }}");
            background-size: cover;
            background-position: center;
            background-position: center top;
        }

        .button {
            background-color: #3cbaec;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            }

        
    </style>
@endsection

@section('content')
    
    <div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
        <div class="breadcrumbs-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="page-title">{{$group->title}}</h1>
                        <ul>
                            <li>
                                <a class="active" href="{{route('classes')}}">All Classes</a>
                            </li>
                            <li>{{$group->title}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="rs-courses-details pt-100 pb-70">
        <div class="container">
            <div class="row mb-30">
                <div class="col-lg-8 col-md-12">
                    <div class="detail-img">
                        @if ($group->img2)
                        <img src="{{ asset('storage/app/'.$group->img2) }}" alt="Courses Images" />
                        @else
                        <img src="{{ asset('public/front/images/cDet.jpg') }}" alt="Courses Images" />
                        @endif
                        
                        
                    </div>
                    <div class="course-content">
                        <!--<h3 class="course-title">Computer Science And Engineering</h3>-->
                        <div class="course-instructor">
                            <div class="row">
                                <div class="col-md-6 mobile-mb-20">
                                    <h3 class="instructor-title">CLASS <span class="primary-color">TEACHER</span></h3>
                                    <div class="instructor-inner">
                                        <div class="instructor-img">
                                            <img src="{{ asset('storage/app/'.$group->user->image) }}" alt="Teachers Images" />
                                        </div>
                                        <div class="instructor-body">
                                            <h3 class="name">{{$group->user->title}} {{$group->user->f_name}} {{$group->user->l_name}}</h3>
                                            <span class="designation">{{$group->user->school}}</span>
                                            <div class="social-icon">
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="short-desc">
                                        <p>{!!$group->user->des!!}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="instructor-title">{{$group->grade->title}} <span class="primary-color">{{$group->subject->title}}</span></h3>
                                    <p>{!!$group->des2!!}</p>

                                    
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-area">
                        <h3 class="title">{{$group->title}}</h3>
                        <h4 class="title">{{$group->grade->title}}</h4>
                        @foreach ($group->g_batches->where('is_active',1) as $clz)
                        <h3 class="instructor-title">{{$clz->year}} <span class="primary-color">{{$clz->title}}</span></h3>
                        <div class="row info-list">
                            <div class="col-md-6">
                                <ul>
                                    <li>
                                        <span>Day :</span> {{$clz->day}}
                                    </li>
                                    <li>
                                        <span>End :</span> {{$clz->end}}
                                    </li>
                                    <li>
                                        <span>Fee :</span> {{$clz->fees}} LKR
                                    </li>
                                   
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>
                                        <span>Start :</span> {{$clz->start}}
                                    </li>
                                    <li>
                                        <span>Type :</span> {{$clz->cat}}
                                    </li>
                                    <li><a href="#" class="button text-right">Register To Enroll</a></li>
                                   
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        
                        

                       
                        


                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
   
   
    
    
@endsection

@section('scripts')
    
@endsection