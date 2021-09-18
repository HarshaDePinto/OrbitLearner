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
                        <h1 class="page-title">Return & Refund Policy</h1>
                        <ul>
                            <li>
                                <a class="active" href="{{route('home')}}">Home</a>
                            </li>
                            <li>Return & Refund Policy</li>
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
                        <h2>Return & Refund Policy</h2>
                        <p>Thanks for subscribing Orbitlearner.com</p>
                    </div>
                    <div class="about-desc">
                        <p>We hope you will be pleased with your purchase. If you are not entirely satisfied with your purchase, we're here to help.</p>
                        <p>We offer a full money-back guarantee for all purchases made on our website. If you are not satisfied with the product that you have purchased from us, you can get your money back no questions asked. You are eligible for a full reimbursement within 7 calendar days of your purchase.</p>
                        <p>After the 7-day period you will no longer be eligible to request for a refund. We encourage our customers to try the product (or service) in the first weeks after their purchase to ensure it fits your needs.</p>
                        <p>The refund will ONLY be made to the original credit/debit card which was used to make the purchase or via the original method of payment.</p>
                        <p>You will receive the credit within a 14 bank working days, depending on your card issuer's policies.</p>
                        <p>Please submit all the refund to us via email info@orbitlearner.com</p>
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