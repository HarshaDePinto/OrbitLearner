<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Think Brighter | Educational Platform</title>
  <link rel='icon'  href='{{ asset('public/front/images/icon.png') }}' />
  <!-- General CSS Files -->
 

  <link rel="stylesheet" href="{{ asset('public/back/assets/css/back.css') }}">
  <link rel="stylesheet" href="{{ asset('public/back/assets/bundles/jquery-selectric/selectric.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register Now</h4>
              </div>
              <div class="card-body">
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                <form method="POST" action="{{ route('register') }}" class="needs-validation" >
                    @csrf
                  <div class="form-group">
                    <div class="d-block">
                        <label for="title" class="control-label">Title</label>
                        <div class="float-right">
                          <a href="#" class="text-small">
                            Please Select
                          </a>
                        </div>
                      </div>
                    <select class="form-control selectric"  name="title">
                        <option value="Mr.">Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Miss.">Miss.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Prof.">Prof.</option>
                        <option value="Rev.">Rev.</option>
                    </select>
                  
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="f_name" class="control-label">First Name</label>
                      <div class="float-right">
                        <a href="#" class="text-small">
                          
                        </a>
                      </div>
                    </div>
                    <input id="f_name" type="text" class="form-control" name="f_name" tabindex="2" required>
                    
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="l_name" class="control-label">Last Name</label>
                      <div class="float-right">
                        <a href="#" class="text-small">
                          
                        </a>
                      </div>
                    </div>
                    <input id="l_name" type="text" class="form-control" name="l_name" tabindex="2" required>
                    
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                        <label for="gender" class="control-label">Gender</label>
                        <div class="float-right">
                          <a href="#" class="text-small">
                            Please Select
                          </a>
                        </div>
                      </div>
                    <select class="form-control selectric"  name="gender">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                  
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="school" class="control-label">School</label>
                      <div class="float-right">
                        <a href="#" class="text-small">
                          
                        </a>
                      </div>
                    </div>
                    <input id="school" type="text" class="form-control" name="school" tabindex="2" required>
                    
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="email" class="control-label">Email</label>
                      <div class="float-right">
                        <a href="#" class="text-small text-danger">
                          **Should Be Active
                        </a>
                      </div>
                    </div>
                    <input onchange="return emailVerify();" id="emailIn" type="email" class="form-control" name="email" tabindex="2" required>
                    <p id="errEmail" class="text-small text-danger"></p>
                    <p id="crrEmail" class="text-small text-success"></p>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="mobile" class="control-label">Mobile</label>
                      <div class="float-right">
                        <a href="#" class="text-small text-danger">
                          **Should Be With You! 
                        </a>
                      </div>
                    </div>
                    <input onchange="return phoneNumber();" id="mobile" maxlength="10" type="text" class="form-control" name="mobile" tabindex="2" required>
                    <p id="errMobile" class="text-small text-danger"></p>
                    <p id="crrMobile" class="text-small text-success"></p>
                    
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="mobile" class="control-label">Are You A Student of Sadhana ?</label>
                      
                    </div>
                    <div class="form-check">
                      <input onclick="return regOnclick1();" class="form-check-input" type="radio" name="is_sadhana" id="is_sadhana1" value="1" required>
                      <label class="form-check-label" for="is_sadhana1">
                        Yes
                      </label>
                    </div>
                    <div class="form-check">
                      <input onclick="return regOnclick2();" class="form-check-input" type="radio" name="is_sadhana" id="is_sadhana2" value="0">
                      <label class="form-check-label" for="is_sadhana2">
                        No
                      </label>
                    </div>
                    <div id="regInput" >
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="parents_name" class="control-label">Parent's Name</label>
                      <div class="float-right">
                        <a href="#" class="text-small">
                          
                        </a>
                      </div>
                    </div>
                    <input id="parents_name" type="text" class="form-control" name="parents_name" tabindex="2" required>
                    
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="#" class="text-small text-danger">
                            ** Minimum 8 Character
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password_confirmation" class="control-label">Password</label>
                      <div class="float-right">
                        <a href="#" class="text-small">
                            
                        </a>
                      </div>
                    </div>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" tabindex="2" required>
                    
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Submit Now
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
            <div class="mb-5 mt-3 text-muted text-center">
              Do you have an account? <a href="{{ route('login') }}">Log In Now</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script src="{{ asset('public/back/assets/js/back.js') }}"></script>
  <script src="{{ asset('public/back/assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
  <script>
    function emailVerify(){
      let email = document.getElementById('emailIn');
      let filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if (!filter.test(email.value)) {
        document.getElementById("errEmail").innerHTML ="Please enter valid email";
        document.getElementById("crrEmail").innerHTML ="";
    }
    else {
      document.getElementById("crrEmail").innerHTML ="Email Valid";
      document.getElementById("errEmail").innerHTML ="";
    }
   
    }
    function phoneNumber()
      {
        let mobile = document.getElementById('mobile');
        let filter = /^\d{10}$/;
        if(mobile.value.match(filter))
              {
                document.getElementById("crrMobile").innerHTML ="Mobile Valid";
                document.getElementById("errMobile").innerHTML ="";
                
              }
            else
              {
                document.getElementById("errMobile").innerHTML ="Mobile Number Need 10 Digit";
                document.getElementById("crrMobile").innerHTML ="";
              }
      }

      function regOnclick1()
      {
        document.getElementById("regInput").innerHTML ="<input  id='sadhana_reg_number' type='text' class='form-control' name='sadhana_reg_number' tabindex='2' placeholder='Sadhana Registration Number' required>";
           
      }
      function regOnclick2()
      {
        document.getElementById("regInput").innerHTML ="<input  id='sadhana_reg_number' type='text' class='form-control' name='sadhana_reg_number' tabindex='2' value='Not A Student' hidden>";
           
      }
  </script>
</body>


</html>