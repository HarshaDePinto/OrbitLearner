@extends('layouts.admin')
@section('styles')
<title>All Grades</title>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>All Grades</h4>
          <div class="card-header-action">
            
              <div class="input-group">
              
                <div class="input-btn">
                   <a href="#addGrade" class="btn btn-sm btn-success">Add A Grade</a>
                </div>
                
              </div>
            
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
                  <th>Title</th>
                  <th>Products</th>
                  <th>Courses</th>
                  <th>Classes</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($grades as $grade)
                <tr>
                  <td>
                    <div class="sort-handler">
                      <i class="fas fa-th"></i>
                    </div>
                  </td>
                  <td>
                    {{$grade->title}}
                    <div class="text-success text-small font-600-bold">Updated By {{$grade->author}} <br>On {{date('d-M-Y', strtotime($grade->updated_at))}}</div>
                  </td>
                  <td></td>
                  <td>
                    {{$grade->groups->count()}}
                  
                  </td>
                 
                  <td>
                    {{$grade->g_batches->count()}}
                   
                  </td>
                  <td><a href="{{route('admin_grade_single',$grade->id)}}" class="btn btn-primary">Detail</a></td>
                </tr>
                @endforeach
                
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="row" id="addGrade">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            
            <div class="card-header">
            <h4>Add A Grade</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('admin_grades_create')}}">
                    @csrf
                    <div class="form-group">
                        <label>Grade Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    
                    <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            
            </div>
        </div>
       
     
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/back/assets/js/page/advance-table.js') }}"></script>

@endsection