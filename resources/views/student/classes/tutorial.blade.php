@extends('layouts.student')

@section('styles')

@endsection

@section('content')
<a href="#"><h5>{{$tutorial->g_tutorial->title}}</h5></a>

    <section class="section">
        <div class="section-body">
            <iframe src="{{ asset('storage/app/'.$tutorial->g_tutorial->doc) }}" frameborder="0" class="embed-responsive-item" width="100%" height="1000"></iframe>
          
        </div>
    </section>
    
    
    
@endsection

@section('scripts')

@endsection