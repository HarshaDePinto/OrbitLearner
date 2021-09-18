@extends('layouts.admin')
@section('styles')
<title>Front Graphic | Admin Panel</title>
<link rel="stylesheet" href="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.css') }}">
@endsection

@section('content')

  <div class="row">
      <div class="col-md-12">
          <form method="POST" enctype="multipart/form-data" action="{{route('admin_web_update',$abt->id)}}">
              @csrf
              @method('PUT')
          <div class="card">
            <div class="card-header">
              <h4>Top Banner | Updated By: {{$abt->author}} {{$abt->updated_at->diffForHumans()}}</h4>
            </div>
            <div class="card-body pb-0">
            
              <div class="form-group">
                  <img alt="image" src="{{ asset('storage/app/'.$abt->m_img) }}" class="img-fluid">
              </div>
              <div class="form-group">
                  <label>Size 1920x850</label>
                  <input type="file" class="form-control" id="m_img" name="m_img">
                  
              </div>
              <div class="form-group">
                <label>Title 01</label>
                <input type="text" class="form-control" name="m_t1" value="{{$abt->m_t1}}">
                
              </div>
              <div class="form-group">
                <label>Title 02</label>
                <input type="text" class="form-control" name="m_t2" value="{{$abt->m_t2}}">
                
              </div>
              <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
            </div>
            <div class="card-footer pt-0 text-right">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
          </form>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <form method="POST" enctype="multipart/form-data" action="{{route('admin_web_update',$abt->id)}}">
              @csrf
              @method('PUT')
          <div class="card">
            <div class="card-header">
              <h4>About us</h4>
            </div>
            <div class="card-body pb-0">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="a_t1" value="{{$abt->a_t1}}">
                
              </div>
              
              <div class="form-group">
                <label>Description 01</label>
                <textarea class="summernote-simple" name="a_des1">{{$abt->a_des1}}</textarea>
              </div>
              <div class="form-group">
                  <label>Description 02</label>
                  <textarea class="summernote-simple" name="a_des2">{{$abt->a_des2}}</textarea>
              </div>
              <div class="form-group">
                  <img alt="image" src="{{ asset('storage/app/'.$abt->a_img1) }}" class="img-fluid">
              </div>
              <div class="form-group">
                  <label>Size 650x620</label>
                  <input type="file" class="form-control" id="a_img1" name="a_img1">
                  
              </div>
              <div class="form-group">
                <label>CEO Name</label>
                <input type="text" class="form-control" name="au_name" value="{{$abt->au_name}}">
                
              </div>
              <div class="form-group">
                <img alt="image" src="{{ asset('storage/app/'.$abt->au_img) }}" class="img-fluid">
            </div>
            <div class="form-group">
                <label>Size 370x430</label>
                <input type="file" class="form-control" id="au_img" name="au_img">
                
            </div>
            <div class="form-group">
                <img alt="image" src="{{ asset('storage/app/'.$abt->au_sig) }}" class="img-fluid">
            </div>
            <div class="form-group">
                <label>Size 199x54</label>
                <input type="file" class="form-control" id="au_sig" name="au_sig">
                
            </div>
            <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
            </div>
            <div class="card-footer pt-0 text-right">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
          </form>
      </div>
  </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data" action="{{route('admin_web_update',$abt->id)}}">
                @csrf
                @method('PUT')
            <div class="card">
            <div class="card-header">
                <h4>Quick Link Photos</h4>
            </div>
            <div class="card-body pb-0">
                
                <div class="form-group">
                    <img alt="image" src="{{ asset('storage/app/'.$abt->c_img) }}" class="img-fluid">
                </div>
                <div class="form-group">
                    <label>Courses - 520x394</label>
                    <input type="file" class="form-control" id="c_img" name="c_img">
                    
                </div>
                <div class="form-group">
                    <img alt="image" src="{{ asset('storage/app/'.$abt->t_img) }}" class="img-fluid">
                </div>
                <div class="form-group">
                    <label>Teachers - 520x394</label>
                    <input type="file" class="form-control" id="t_img" name="t_img">
                    
                </div>
                <div class="form-group">
                    <img alt="image" src="{{ asset('storage/app/'.$abt->cl_img) }}" class="img-fluid">
                </div>
                <div class="form-group">
                    <label>Classes - 520x394</label>
                    <input type="file" class="form-control" id="cl_img" name="cl_img">
                    
                </div>
                <div class="form-group">
                    <img alt="image" src="{{ asset('storage/app/'.$abt->g_img) }}" class="img-fluid">
                </div>
                <div class="form-group">
                    <label>Gallery - 520x394</label>
                    <input type="file" class="form-control" id="g_img" name="g_img">
                    
                </div>
                <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
            </div>
            <div class="card-footer pt-0 text-right">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
            </form>
        </div>
    </div>
  <div class="row">
      <div class="col-md-12">
          <form method="POST" enctype="multipart/form-data" action="{{route('admin_web_update',$abt->id)}}">
              @csrf
              @method('PUT')
          <div class="card">
            <div class="card-header">
              <h4>Video Section</h4>
            </div>
            <div class="card-body pb-0">
              <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="v_tit" value="{{$abt->v_tit}}">
                
              </div>
              
                <div class="form-group">
                    <img alt="image" src="{{ asset('storage/app/'.$abt->v_img) }}" class="img-fluid">
                </div>
                <div class="form-group">
                    <label>Video Image - 1920x600</label>
                    <input type="file" class="form-control" id="v_img" name="v_img">
                    
                </div>
            
              
              <div class="form-group">
                <label>Video Link</label>
                  <input type="text" class="form-control" name="v_link" value="{{$abt->v_link}}">
                  
              </div>
             
            </div>
            <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
            <div class="card-footer pt-0 text-right">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
          </form>
      </div>
  </div>
  <div class="row">
      <div class="col-md-12">
          <form method="POST" enctype="multipart/form-data" action="{{route('admin_web_update',$abt->id)}}">
              @csrf
              @method('PUT')
          <div class="card">
            <div class="card-header">
              <h4>Last Banner</h4>
            </div>
            <div class="card-body pb-0">
              <div class="form-group">
                <label>Title 01</label>
                <input type="text" class="form-control" name="ab_t1" value="{{$abt->ab_t1}}">
                
              </div>
              <div class="form-group">
                  <label>Title 02</label>
                  <input type="text" class="form-control" name="ab_t2" value="{{$abt->ab_t2}}">
                  
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="summernote-simple" name="ab_des1">{{$abt->ab_des1}}</textarea>
              </div>
              <div class="form-group">
                  <img alt="image" src="{{ asset('storage/app/'.$abt->ab_img) }}" class="img-fluid">
              </div>
              <div class="form-group">
                  <label>Size 1920x590</label>
                  <input type="file" class="form-control" id="ab_img" name="ab_img">
                  
              </div>
            
              <input type="text" class="form-control" name="author" value="{{Auth::user()->title}} {{Auth::user()->f_name}} {{Auth::user()->l_name}}" hidden>
            </div>
            <div class="card-footer pt-0 text-right">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
          </form>
      </div>
  </div>
  
@endsection

@section('scripts')
<script src="{{ asset('public/back/assets/bundles/summernote/summernote-bs4.js') }}"></script>
@endsection