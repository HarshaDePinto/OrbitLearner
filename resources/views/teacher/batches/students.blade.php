@extends('layouts.teacher')
@section('styles')

<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/back/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="btn-group mb-3" role="group" aria-label="Basic example">
            <a href="{{route('teacher_b_online',$batch->id)}}" class="btn btn-success">Online</a>
            <a href="{{route('teacher_b_students',$batch->id)}}" class="btn btn-primary ">Students</a>
            <a href="{{route('teacher_b_tutorial',$batch->id)}}" class="btn btn-info ">Tutorial</a>
            <a href="{{route('teacher_b_video',$batch->id)}}" class="btn btn-warning ">Video</a>
            <a href="{{route('teacher_b_mcq',$batch->id)}}" class="btn btn-success ">MCQ</a>
            <a href="{{route('teacher_b_essay',$batch->id)}}" class="btn btn-info ">Essay</a>
            <a href="{{route('teacher_b_single',$batch->id)}}" class="btn btn-primary ">Edit</a>
          </div>

      <div class="row">
      
        <div class="col-12">
          <div class="card">
              <div class="card">
                  <div class="card-header">
                    <h4>Students of {{$batch->user->title}} {{$batch->user->f_name}} {{$batch->user->l_name}} | {{$batch->grade->title}} | {{$batch->year}} | {{$batch->title}}</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                              <th></th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Reg: Date</th>
                            
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($batch->b_students as $student)
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
                            <td>
                              <a href="#" target="_blank">{{$student->user->title}} {{$student->user->f_name}} {{$student->user->l_name}}</a>
                              
                              <div class="text-success text-small font-600-bold">{{$student->user->user_name}}</div>
                              </td>
                           <td>
                            0{{$student->user->mobile}}
                           </td>
                           <td>{{date('d-m-Y', strtotime($student->created_at))}}</td>
                            
                            
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
      
    </div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
  <script src="{{ asset('public/back/assets/js/page/datatables.js') }}"></script>
@endsection