@extends('layouts.student')

@section('styles')

@endsection

@section('content')
<a href="#"><h5>{{$video->g_video->title}}</h5></a>

    <section class="section">
        <div class="section-body">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="{{$video->g_video->vid}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            
          
        </div>
    </section>
    
    
    
@endsection

@section('scripts')

@endsection