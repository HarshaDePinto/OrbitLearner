@extends('layouts.admin')
@section('styles')
<title>{{$mark->b_student->user->title}} {{$mark->b_student->user->f_name}} | Results</title>

@endsection



@section('content')
<section class="section">
  <div class="section-body">
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-4">
        <div class="card author-box">
          <div class="card-body">
            <div class="author-box-center">
              
              @if ($mark->b_student->user->image)
                <img alt="image" src="{{ asset('storage/app/'.$mark->b_student->user->image) }}" class="rounded-circle author-box-picture">  
                 @else
                 @if ($mark->b_student->user->gender==1)
                 <img alt="image" src="{{ asset('public/back/assets/img/admin.png') }}" class="rounded-circle author-box-picture">
                 @endif
                 @if ($mark->b_student->user->gender==2)
                 <img alt="image" src="{{ asset('public/back/assets/img/adminf.png') }}" class="rounded-circle author-box-picture">
                 @endif
                 
                
                @endif
              <div class="clearfix"></div>
              <div class="author-box-name">
                <a href="#">{{$mark->b_student->user->title}} {{$mark->b_student->user->f_name}}</a>
              </div>
              <div class="author-box-job"><b>{{$mark->b_student->g_batch->title}} | {{$mark->b_mcq->g_mcq->number}}. {{$mark->b_mcq->g_mcq->title}}</b> </div>
            
            </div>
            <div class="media-progressbar p-t-10">
                {{$mark->average}}%
                <div class="progress" data-height="6" style="height: 6px;">
                  <div class="progress-bar bg-success" data-width="{{$mark->average}}%" style="width: {{$mark->average}}%;"></div>
                </div>
            </div>
          </div>
        </div>
       
        
        
      </div>
      <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="padding-20">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#Questions" role="tab"
                  aria-selected="true">Results</a>
              </li>
              
             
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
                <div class="tab-pane fade show active" id="Questions" role="tabpanel" aria-labelledby="home-tab2">
                   
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-md">
                          <tbody><tr>
                            <th data-width="40" style="width: 40px;">Q</th>
                            <th class="text-center">Your Ans:</th>
                            <th class="text-center">Correct Ans:</th>
                            <th class="text-center">Result</th>
                            <th class="text-right">Marks</th>
                          </tr>
                          @foreach ($mark->m_results as $rst)
                          <tr>
                            <td>{{$rst->q_number}}</td>
                            <td class="text-center">{{$rst->s_answer}}</td>
                            <td class="text-center">{{$rst->q_answer}}</td>
                            <td class="text-center">
                                @if ($rst->result==1)
                                <span class="badge badge-success">Correct</span>
                                @endif
                                @if ($rst->result==0)
                                <span class="badge badge-danger">Wrong</span>
                                @endif
                                
                            </td>
                            <td class="text-right">{{$rst->s_mark}}</td>
                          </tr>
                          @endforeach
                          <tr>
                            <th colspan="4">Total Marks</th>
                            <th class="text-right">{{$mark->student_mark}}</th>
                          </tr>
                          <tr>
                            <th colspan="4">Average</th>
                            <th class="text-right">{{$mark->average}}%</th>
                          </tr>
                         
                        </tbody>
                    </table>
                    </div>
                    
                </div>
                
               
             
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')


@endsection