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

        
    </style>
@endsection

@section('content')
    
    <div class="rs-breadcrumbs bg7 breadcrumbs-overlay">
        <div class="breadcrumbs-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="page-title">Certified Teachers</h1>
                        <ul>
                            <li>
                                <a class="active" href="{{route('home')}}">Home</a>
                            </li>
                            <li>Certified Teachers</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div id="rs-team-2" class="rs-team-2 team-all pt-100 pb-70">
        <div class="container">
            <div class="row mb-30">
                <div class="col-lg-9 col-md-12">
                    <div class="row">
                        @foreach ($teachers as $teacher)
                        <div class="col-lg-4 col-md-6 col-xs-6">
                            <div class="team-item">
                                <div class="team-img">
                                    <a href="#"><img src="{{ asset('storage/app/'.$teacher->image) }}" alt="" /></a>
                                    <div class="social-icon">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="team-body">
                                    <a href="{{route('teacher_single',$teacher->id)}}"><h3 class="name">{{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}</h3></a>
                                    <span class="designation">{!!$teacher->des!!}</span>
                                </div>
                            </div>						
                        </div>
                        @endforeach
                        
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="sidebar-area">
                       
                        <div class="cate-box">
                            <h3 class="title">Teachers By Subject</h3>
                            <ul>
                                @foreach ($subjects as $subject)
                                <li>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i> 
                                    <a href="{{route('teachers_by_subject',$subject->id)}}">{{$subject->title}} <span>({{$subject->s_teachers->count()}})</span></a>
                                </li>
                                @endforeach
                                
                               
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
    
@endsection

@section('scripts')
    
@endsection