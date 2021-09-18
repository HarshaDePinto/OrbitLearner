@extends('layouts.admin')
@section('styles')
<title>Result of {{$mcq->g_mcq->group->title}} | {{$mcq->g_mcq->number}}. {{$mcq->g_mcq->title}}</title>
@endsection

@section('content')

<section class="section">
  <div class="section-body">
   
    <div class="row mt-sm-4">
      
      <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="padding-20">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              
              <li class="nav-item">
                <a class="nav-link active" id="profile-tab2" data-toggle="tab" href="#Results" role="tab"
                  aria-selected="false">Results</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#didNot" role="tab"
                  aria-selected="false">Did Not Answer</a>
              </li>
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
             
              <div class="tab-pane fade show active" id="Results" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4>Result of {{$mcq->g_mcq->group->title}} | {{$mcq->g_mcq->number}}. {{$mcq->g_mcq->title}} </h4>
                        <div class="card-header-action">
                         
                        </div>
                      </div>
                      <div class="card-body p-0">
                          
                        <div class="table-responsive">
                          <table class="table table-striped" id="sortable-table">
                            <thead>
                              <tr>
                                <th class="text-center">
                                  <i class="fas fa-th"></i>
                                </th>
                                <th>Name</th>
                                <th>Reg. No</th>
                                <th>Marks</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($mcq->m_marks->sortBy('average') as $mark)
                                <tr>
                                  <td>
                                    <div class="sort-handler">
                                      @if ($mark->b_student->user->image)
                                      <img alt="image" class="rounded-circle" width="35"
                                        data-toggle="tooltip" title="{{$mark->b_student->user->title}} {{$mark->b_student->user->f_name}}" src="{{ asset('storage/app/'.$mark->b_student->user->image) }}">
                                          
                                           
                                          @else
                                          @if ($mark->b_student->user->gender==1)
                                          <img alt="image" class="rounded-circle" width="35"
                                        data-toggle="tooltip" title="{{$mark->b_student->user->title}} {{$mark->b_student->user->f_name}}" src="{{ asset('public/back/assets/img/admin.png') }}">
                                          
                                          
                                          @endif
                                          @if ($mark->b_student->user->gender==2)
                                          <img alt="image" class="rounded-circle" width="35"
                                        data-toggle="tooltip" title="{{$mark->b_student->user->title}} {{$mark->b_student->user->f_name}}" src="{{ asset('public/back/assets/img/adminf.png') }}">
                                          @endif
                                          @endif
                                      
                                    </div>
                                  </td>
                                  <td>{{$mark->b_student->user->title}} {{$mark->b_student->user->f_name}} {{$mark->b_student->user->l_name}}</td>
                                 <td>
                                  {{$mark->b_student->user->user_name}}
                                 </td>
                                  <td>
                                      <div class="media-progressbar p-t-10">
                                          {{$mark->average}}%
                                          <div class="progress" data-height="6" style="height: 6px;">
                                            <div class="progress-bar bg-success" data-width="{{$mark->average}}%" style="width: {{$mark->average}}%;"></div>
                                          </div>
                                      </div>
                                    
                                  </td>
                                  <td><a href="{{route('admin_b_mcq_result_s',$mark->id)}}" class="btn btn-primary">Detail</a></td>
                                </tr>
                                @endforeach
                              
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="didNot" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                       
                        <div class="card-header-action">
                         
                        </div>
                      </div>
                      <div class="card-body p-0">
                          
                        <div class="table-responsive">
                          <table class="table table-striped" id="sortable-table">
                            <thead>
                              <tr>
                                <th class="text-center">
                                  <i class="fas fa-th"></i>
                                </th>
                                <th>Name</th>
                                <th>Reg. No</th>
                                <th>Mobile</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($mcq->g_batch->b_students as $student)
                              @if ($student->m_marks->where('b_mcq_id',$mcq->id)->count()==0)
                                <tr>
                                  <td>
                                    <div class="sort-handler">
                                      @if ($student->user->image)
                                      <img alt="image" class="rounded-circle" width="35"
                                        data-toggle="tooltip" title="{{$student->user->title}} {{$student->user->f_name}}" src="{{ asset('storage/app/'.$student->user->image) }}">
                                          
                                           
                                          @else
                                          @if ($student->user->gender==1)
                                          <img alt="image" class="rounded-circle" width="35"
                                        data-toggle="tooltip" title="{{$student->user->title}} {{$student->user->f_name}}" src="{{ asset('public/back/assets/img/admin.png') }}">
                                          
                                          
                                          @endif
                                          @if ($student->user->gender==2)
                                          <img alt="image" class="rounded-circle" width="35"
                                        data-toggle="tooltip" title="{{$student->user->title}} {{$student->user->f_name}}" src="{{ asset('public/back/assets/img/adminf.png') }}">
                                          @endif
                                          @endif
                                      
                                    </div>
                                  </td>
                                  <td>{{$student->user->title}} {{$student->user->f_name}} {{$student->user->l_name}}</td>
                                 <td>
                                  {{$student->user->user_name}}
                                 </td>
                                  <td>
                                    0{{$student->user->mobile}}
                                    
                                  </td>
                                  
                                </tr>
                                @endif
                            @endforeach
                              
                              
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
        </div>
      </div>
    </div>
  </div>
</section>



@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/advance-table.js') }}"></script>
@endsection