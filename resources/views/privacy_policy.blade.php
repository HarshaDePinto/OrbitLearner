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
                        <h1 class="page-title">Privacy Policy</h1>
                        <ul>
                            <li>
                                <a class="active" href="{{route('home')}}">Home</a>
                            </li>
                            <li>Privacy Policy</li>
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
                        <h2>Privacy Policy</h2>
                        <p>Updated at 2021-07-28</p>
                    </div>
                    <div class="about-desc">
                        <p>Orbitlearner.com is committed to protecting your privacy. This Privacy Policy explains how your personal information is collected, used, and disclosed information that results from your use of our Service.</p>
                        <p>This Privacy Policy apples to our website, and its associated subdomains collectively. Alongside our application, Orbitlearner.com. By accessing or using our Service, you signify that you have read, understood, and agree to our collection, storage, use, and disclosure of your personal Information. </p>
                        <p>Don't hesitate to contact us if you have any questions</p>
                        <ul>
                            <li>@ Via Email info@orbitlearner.com</li>
                            <li>@ Via Phone Number 0114 388 281</li>
                        </ul>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('scripts')
    
@endsection