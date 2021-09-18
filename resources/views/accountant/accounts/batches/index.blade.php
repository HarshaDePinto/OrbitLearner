@extends('layouts.accountant')
@section('styles')

@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Classes</h4>
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
                      
                      <th>Teacher Account</th>
                      
                      
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($teachers as $teacher)
                      <tr>
                        <td>
                          <div class="sort-handler">
                            @if ($teacher->image)
                            <img alt="image" class="rounded-circle" width="35"
                              data-toggle="tooltip" title="{{$teacher->title}} {{$teacher->f_name}}" src="{{ asset('storage/app/'.$teacher->image) }}">
                                
                                 
                                @else
                                @if ($teacher->gender==1)
                                <img alt="image" class="rounded-circle" width="35"
                              data-toggle="tooltip" title="{{$teacher->title}} {{$teacher->f_name}}" src="{{ asset('public/back/assets/img/admin.png') }}">
                                
                                
                                @endif
                                @if ($teacher->gender==2)
                                <img alt="image" class="rounded-circle" width="35"
                              data-toggle="tooltip" title="{{$teacher->title}} {{$teacher->f_name}}" src="{{ asset('public/back/assets/img/adminf.png') }}">
                                @endif
                                @endif
                            
                          </div>
                        </td>
                        <td>
                          <a href="#">
                          {{$teacher->title}} {{$teacher->f_name}} {{$teacher->l_name}}
                        </a>
                          <div class=" text-small font-600-bold">
                            <span class="text-info"><i class="fas fa-tablet-alt"></i> 0{{$teacher->mobile}}</span> | 
                            @if ($teacher->is_active==1)
                            <span class="text-success">Active</span>
                            
                            @else
                            <span class="text-warning">Deactive</span>
                            
                           
                            @endif
                            
                          </div>
                        </td>
                      
                        <td><a href="{{route('accountant_teacher_account',$teacher->id)}}" class="btn btn-sm btn-info">Details</a></td>
                       
                       
                       
                      </tr>
                      @endforeach
                    
                    
                  </tbody>
                </table>
              </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/advance-table.js') }}"></script>
@endsection