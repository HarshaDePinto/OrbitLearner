@extends('layouts.admin')
@section('styles')
<title>{{$sub->title}}</title>
@endsection



@section('content')
<section class="section">
  <div class="section-body">
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-4">
        <div class="card author-box">
          <div class="card-body">
            <div class="author-box-center">
              
              <div class="clearfix"></div>
              <div class="author-box-name">
                <a href="#">{{$sub->title}}</a>
              </div>
              <div class="author-box-job"><b></b> </div>
              
            </div>
            <div class="text-center">
              <div class="author-box-description">
                
              </div>
              <div class="mb-2 mt-3">
               
                
              </div>
             
            </div>
            <div class="author-box-job"><b>Updated By: {{$sub->author}} <br> {{$sub->updated_at->diffForHumans()}}</b></div>
          </div>
          
        </div>
        <div class="card">
          <div class="card-header">
            <h4>Subject Details</h4>
          </div>
          <div class="card-body">
            <div class="py-4">
              
              <p class="clearfix">
                <span class="float-left">
                  Courses
                </span>
                <span class="float-right text-muted">
                  {{$sub->groups->count()}}
                </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Classes
                </span>
                <span class="float-right text-muted">
                  {{$sub->g_batches->count()}}
                </span>
              </p>
              
              
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header">
            <button class="btn btn-danger btn-sm btn-block" type="button" data-toggle="collapse"
                data-target="#subjectDelete" aria-expanded="false" aria-controls="subjectDelete">
                Delete
              </button>
          </div>
          <div class="card-body">
            
            <div class="collapse" id="subjectDelete">
              
                @if ($sub->groups->count()==0)
                <div class="alert alert-danger">
                  All the content including related images will delete permanently from the system and will not be able to recover again. <b>Are you sure?</b>
                </div>
                    
                    <form method="POST" class="needs-validation" enctype="multipart/form-data" action="{{route('admin_subjects_delete')}}">
                      @csrf
                      
                      
                      <input type="text" class="form-control" name="id" value="{{$sub->id}}" hidden>
                     
                      <button class="btn btn-danger btn-block">Yes, Delete</button>
                    </form>
                @else
                <div class="alert alert-warning">
                  You Already created classes under this subject, you should delete them first, before deleting the subject!
                </div>
                @endif
                
              
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-12 col-md-12 col-lg-8">
        <div class="card">
          <div class="padding-20">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#Classes" role="tab"
                  aria-selected="true">Classes</a>
              </li>
            
             
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#Students" role="tab"
                  aria-selected="false">Batches</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#Edit" role="tab"
                  aria-selected="false">Edit</a>
              </li>
              
              
            </ul>
            <div class="tab-content tab-bordered" id="myTab3Content">
              <div class="tab-pane fade show active" id="Classes" role="tabpanel" aria-labelledby="home-tab2">
                <div class="card">
                  <div class="card-header">
                    <h4>All {{$sub->title}} Classes</h4>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Teacher</th>
                          <th scope="col">Grade</th>
                          <th scope="col">Class</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($sub->groups as $group)
                        <tr>
                          <td>
                            <a href="{{route('admin_teacher_single',$group->user->id)}}"> {{$group->user->title}} {{$group->user->f_name}} {{$group->user->l_name}}</a>
                           
                          </td>
                          <td>
                            <a href="{{route('admin_grade_single',$group->grade->id)}}"> {{$group->grade->title}}</a>
                          </td>
                          <td>
                            <a href="{{route('admin_teacher_group_single',$group->id)}}"> {{$group->title}}</a>
                          </td>
                        </tr> 
                        @endforeach
                        
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             
              <div class="tab-pane fade" id="Edit" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="card">
            
                  <div class="card-header">
                  <h4>Edit Subject</h4>
                  </div>
                  <div class="card-body">
                      <form method="POST" enctype="multipart/form-data" action="{{route('admin_subjects_update',$sub->id)}}">
                          @csrf
                          @method('PUT')
                          <div class="form-group">
                              <label>Grade Title</label>
                              <input type="text" class="form-control" name="title" value="{{$sub->title}}">
                          </div>
                          
                          <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
                          <div class="card-footer text-right">
                              <button type="submit" class="btn btn-success">Save Changes</button>
                          </div>
                      </form>
                  
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="Students" role="tabpanel" aria-labelledby="profile-tab2">
                <div class="card">
                  <div class="card-header">
                    <h4>All {{$sub->title}} Batches</h4>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Teacher</th>
                          <th scope="col">Grade</th>
                          <th scope="col">Batch</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($sub->g_batches as $clz)
                        <tr>
                          <td>
                            <a href="{{route('admin_teacher_single',$clz->user->id)}}"> {{$clz->user->title}} {{$clz->user->f_name}} {{$clz->user->l_name}}</a>
                           
                          </td>
                          <td>
                            <a href="{{route('admin_grade_single',$clz->grade->id)}}"> {{$clz->grade->title}}</a>
                          </td>
                          <td>
                            <a href="{{route('admin_teacher_batch_single',$clz->id)}}"> {{$clz->year}} | {{$clz->title}}</a>
                          </td>
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
    </div>
  </div>
</section>
@endsection

@section('scripts')

@endsection