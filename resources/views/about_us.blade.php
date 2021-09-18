@extends('layouts.think')

@section('seo')
    <title>Orbit Learner | Educational Platform</title>
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
                        <h1 class="page-title">About Us</h1>
                        <ul>
                            <li>
                                <a class="active" href="{{route('home')}}">Home</a>
                            </li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
   
    <div class="rs-courses-list sec-spacer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 rs-vertical-bottom mobile-mb-50">
                    <a href="#">
                        <img src="{{ asset('public/front/images/about/about2.jpg') }}" alt="History Image"/>
                    </a>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="abt-title">
                        <h2>Orbit Learner Profile</h2>
                    </div>
                    <div class="about-desc">
                        <p>Orbit Learner Educational Platform maintains under the Sadhana Educational Center (WD 6806).</p>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    
@endsection