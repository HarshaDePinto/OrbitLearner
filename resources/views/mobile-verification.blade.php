<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Orbit Learner | Educational Platform | Mobile Verification</title>
  <!-- General CSS Files -->
 

  <link rel="stylesheet" href="{{ asset('public/back/assets/css/back.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Mobile Verification</h4>
              </div>
              <div class="card-body">
                @if (session()->has('danger'))
                <div class="alert alert-danger alert-has-icon">
                  <div class="alert-icon"><i class="
                    fas fa-exclamation-triangle"></i></div>
                  <div class="alert-body">
                    <div class="alert-title">{{session()->get('danger')}}</div>
                    
                  </div>
                </div>
               
                @endif
                  <h6>Hi, {{Auth::user()->f_name}}</h6>
                  <p><b>Warmly Welcome You!</b></p>
                  
                  <p>We already send you the OPT code for your registered mobile number:<b> 0{{Auth::user()->mobile}}</b></p>
                <form method="POST" action="{{ route('mobile_activation') }}" class="needs-validation" >
                    @csrf
                  <div class="form-group">
                    <label for="opt">Enter The OPT code</label>
                    <input id="opt" type="text" class="form-control" name="opt" tabindex="1" required>
                  
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                     Verify
                    </button>
                  </div>
                </form>
                <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Go Back To Main Page</div>
                </div>
                <div class="form-group">
                    
                    <a href="{{route('home')}}"><button class="btn btn-success btn-lg btn-block" tabindex="4">
                        Home Page
                      </button></a>
                </div>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="{{route('home')}}">Create One</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="{{ asset('public/back/assets/js/back.js') }}"></script>
</body>


</html>