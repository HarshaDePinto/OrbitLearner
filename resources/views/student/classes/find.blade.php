@extends('layouts.student')
@section('styles')

@endsection
@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
          <form method="POST" enctype="multipart/form-data" action="{{route('student_search_classes')}}">
            @csrf
            <div class="card">
                <div class="card-header">
                  <h4>Please Select Your Grade & Subject</h4>
                </div>
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Choose Grade</label>
                        <select class="custom-select" name="grade_id">
                         @foreach ($grades as $grade)
                         <option value="{{$grade->id}}"
                          
                          @if ($grade->id==session('grade_id'))
                              selected
                          @endif
                          >{{$grade->title}}</option>
                         @endforeach
                          
                         
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Choose Subject</label>
                        <select class="custom-select" name="subject_id">
                            @foreach ($subjects as $subject)
                         <option value="{{$subject->id}}"
                          @if ($subject->id==session('subject_id'))
                              selected
                          @endif
                          
                          >{{$subject->title}}</option>
                         @endforeach
                        </select>
                    </div>
                  </div>
                  
                  
                </div>
                <div class="card-footer text-right">
                  <button class="btn btn-primary">Submit</button>
                </div>
            </div>
          </form>
          
        </div>
        
      </div>
    </div>
</section>
<section class="section">
  <div class="section-body">
    @if (session()->has('s_cls'))
    <div class="row">
      <div class="col-12">
        <div class="card">
          
          <div class="card-body p-0">
              
                  
                  
            @if (session('s_cls')->count()!=0)
            <div class="table-responsive">
              <table class="table table-striped" id="sortable-table">
                <thead>
                  <tr>
                    <th class="text-center">
                      <i class="fas fa-th"></i>
                    </th>
                    <th>Teacher</th>
                    
                    <th>Class</th>
                    
                    <th>Time</th>
                    <th>Fees</th>
                    <th>Enrol</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach (session('s_cls') as $clz)
                    <tr>
                      <td>
                        <div class="sort-handler">
                          @if ($clz->user->image)
                          <img alt="image" class="rounded-circle" width="35"
                            data-toggle="tooltip" title="{{$clz->user->title}} {{$clz->user->f_name}}" src="{{ asset('storage/app/'.$clz->user->image) }}">
                              
                              
                              @else
                              @if ($clz->user->gender==1)
                              <img alt="image" class="rounded-circle" width="35"
                            data-toggle="tooltip" title="{{$clz->user->title}} {{$clz->user->f_name}}" src="{{ asset('public/back/assets/img/admin.png') }}">
                              
                              
                              @endif
                              @if ($clz->user->gender==2)
                              <img alt="image" class="rounded-circle" width="35"
                            data-toggle="tooltip" title="{{$clz->user->title}} {{$clz->user->f_name}}" src="{{ asset('public/back/assets/img/adminf.png') }}">
                              @endif
                              @endif
                          
                        </div>
                      </td>
                      <td>
                        {{$clz->user->title}} {{$clz->user->f_name}} {{$clz->user->l_name}}
                      
                      </td>
                    
                      <td>
                        {{$clz->year}} | {{$clz->title}}
                        <div class=" text-small font-600-bold">
                          <span class="text-info"> {{$clz->grade->title}}</span> | 
                          <span class="text-success">{{$clz->subject->title}}</span>
                          
                        </div>
                      </td>
                    
                      <td>
                        {{$clz->day}}
                        <div class=" text-small font-600-bold">
                          <span class="text-info"> {{$clz->start}}</span> to 
                          <span class="text-info">{{$clz->end}}</span>
                          
                        </div>
                      </td>
                      <td>
                        {{$clz->fees}} LKR
                        
                        
                      </td>
                      <td>
                        @if ($student->b_students->where('g_batch_id',$clz->id)->count()==0)
                        <form method="POST" enctype="multipart/form-data" action="{{route('student_enrol')}}">
                          @csrf
                          <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                          <input type="text" class="form-control" name="student_id" value="{{$student->id}}" hidden>
                          <input type="text" class="form-control" name="g_batch_id" value="{{$clz->id}}" hidden>
                          <input type="text" class="form-control" name="amount" value="{{$clz->fees}}" hidden>
                          <button class="btn btn-primary btn-sm">Enrol</button>

                        </form>
                        @else
                            Already In
                        @endif
                        
                      </td>
                    </tr>
                    @endforeach
                  
                  
                </tbody>
              </table>
            </div>
            @else
            <div class="alert alert-danger">
              No matching results in our Database!
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</section>


@endsection
@section('scripts')
<script src="{{ asset('public/back/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/advance-table.js') }}"></script>
@endsection