@extends('layouts.think')

@section('seo')
    <title>Orbit Learner | Educational Platform| Educational Platform</title>
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
            padding: 15px 32px;
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
                        <h1 class="page-title">Our Classes</h1>
                        <ul>
                            <li>
                                <a class="active" href="{{route('home')}}">Home</a>
                            </li>
                            <li>Our Classes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
    <div class="rs-courses-list sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    @if (session()->has('search_classes'))
                    <h3 class="title">{{session('s_grade')->title}} | {{session('s_subject')->title}} Classes ({{session('search_classes')->count()}})</h3>
                    @else
                    <h3 class="title">Please Enter The Grade and Subject</h3>
                    @endif
                    
                    @if (session()->has('search_classes'))
                        @if (session('search_classes')->count()!=0)
                        @foreach (session('search_classes') as $group)
                        <div class="row course-item">
                            <div class="col-md-6">
                                <div class="course-img">
                                    @if ($group->img1)
                                        <img src="{{ asset('storage/app/'.$group->img1) }}" alt="" />
                                    @else
                                        <img src="{{ asset('public/front/images/cThu.jpg') }}" alt="" />
                                    @endif
                                    <a class="image-link" href="{{route('class_single',$group->id)}}" title="{{$group->title}}">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>                        		
                            </div>
                            <div class="col-md-6">
                                <div class="course-header">
                                    <span class="course-category"><a href="{{route('teacher_single',$group->user->id)}}">{{$group->user->title}} {{$group->user->f_name}} {{$group->user->l_name}}</a> |{{$group->grade->title}}</span>
                                    <h3 class="course-title"><a href="{{route('class_single',$group->id)}}">{{$group->title}}</a></h3>
                                 
                                </div>
                                <div class="course-body">
                                    <div class="course-desc">
                                        <p>
                                            {!!$group->des1!!}
                                        </p>
                                    </div>
                                    <div class="course-button">
                                        <a href="{{route('class_single',$group->id)}}"">READ MORE</a>
                                    </div>
                                </div>                       		
                            </div>
                        </div>
                        @endforeach
                        
                        @else
                        <h3 class="title text-danger">Sorry, No Result !</h3>
                        @endif
                    
                    @endif
                    
                    
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-area">
                       
                        <div class="cate-box">
                            
                            <div class="search-box">
                                <h3 class="title">Search Classes</h3>
                                <form method="POST" enctype="multipart/form-data" action="{{route('classes_search')}}">
                                    @csrf
                                <div class="box-search">
                                    
                                    <label>Subject</label>
                                    <select class="form-control" name="subject_id" required>
                                        @foreach ($subjects as $subject)
                                        
                                        <option value="{{$subject->id}}">{{$subject->title}}</option>
                                        
                                        
                                        @endforeach
                                    
                                    
                                    </select>
                                </div>
                                <div class="box-search">
                                    
                                    <label>Grade</label>
                                    <select class="form-control" name="grade_id" required>
                                        @foreach ($grades as $grade)
                                        
                                        <option value="{{$grade->id}}">{{$grade->title}}</option>
                                        
                                        
                                        @endforeach
                                    
                                    
                                    </select>
                                    
                                </div>
                                <div class="view-btn mt-2 text-right">
                                    <input type="submit" class="button" value="Search">
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
    
@endsection