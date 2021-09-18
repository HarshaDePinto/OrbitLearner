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
                        <h1 class="page-title">{{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}</h1>
                        <ul>
                            <li>
                                <a class="active" href="{{route('teachers')}}">Teachers</a>
                            </li>
                            <li>{{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="rs-team-single pt-100">
        <div class="container">
            <div class="row team">
                <div class="col-lg-4 col-md-12">
                    <div class="team-photo mobile-mb-40">
                        <img src="{{ asset('storage/app/'.$teacher->image) }}" alt="Team1">
                        <div class="team-icons">
                            <a href="#" title="facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" title="twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" title="google plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="#" title="linkedin">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <h3 class="team-name">{{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}</h3>
                    <p class="team-title">
                        {!!$teacher->des!!}
                    </p>
                    <p class="team-contact">
                        <i class="fa fa-mobile"></i> 0{{$teacher->mobile}} <i class="ml-15 fa fa-envelope-o"></i> {{$teacher->email}}
                    </p>
                    <p>
                        {!!$teacher->des2!!}
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    
@endsection