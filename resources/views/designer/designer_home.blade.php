@extends('layouts.designer')

@section('content')

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        @if ($designer->image)
                        <img alt="image" src="{{ asset('storage/app/'.$designer->image) }}" class="rounded-circle profile-widget-picture">  
                        @else
                        @if ($designer->gender==1)
                        <img alt="image" src="{{ asset('public/back/assets/img/admin.jpg') }}" class="rounded-circle profile-widget-picture">
                        @endif
                        @if ($designer->gender==2)
                        <img alt="image" src="{{ asset('public/back/assets/img/adminf.jpg') }}" class="rounded-circle profile-widget-picture">
                        @endif
                    
                    
                        @endif
                    
                
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Name</div>
                                <div class="profile-widget-item-value">{{$designer->title}} {{$designer->f_name}}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Reg: No</div>
                                <div class="profile-widget-item-value">{{$designer->user_name}}</div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Gender</div>
                                <div class="profile-widget-item-value">
                                    @if ($designer->gender==1)
                                    Male
                                    @endif
                                    @if ($designer->gender==2)
                                        Female
                                    @endif
                                </div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Birthday</div>
                                <div class="profile-widget-item-value">
                                    @if ($designer->birthday)
                                    {{$designer->birthday}}
                                    @else
                                        **Please Fill
                                    @endif
                                    
                                </div>
                            </div>
                            

                        
                        </div>
                        <a href="{{route('designer_profile',$designer->id)}}" class="btn btn-primary btn-sm btn-block">My Profile</a>
                       
                         
                        
                    </div>
                </div>
                
                
            
            
            </div>
            
         
            <div class="col-12 col-sm-12 col-lg-6">
                
                <div class="card">
                    <div class="card-header">
                    <h4 class="text-info">Announcement </h4>
                    </div>
                    <div class="card-body">
                    
                    </div>
                </div>
                
            </div>
            
            
            
        </div>
       
        
    </div>
</section>
@endsection