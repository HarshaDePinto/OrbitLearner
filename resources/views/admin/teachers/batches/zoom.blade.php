@extends('layouts.admin')
@section('styles')
<link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.5/css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="https://source.zoom.us/1.9.5/css/react-select.css" />

@endsection
@section('content')

<h2>Please Click Join Button Bellow!</h2>
<br>
<form  id="meeting_form">
    <div class="form-group">
        <input type="hidden" name="display_name" id="display_name" value="Harsha De Pinto" maxLength="100"
            placeholder="Name" class="form-control" required>
    </div>
    <div style="display:none;">
    <div class="form-group">
        <input type="text" name="meeting_number" id="meeting_number" value="{{$data['meeting_id']}}" maxLength="200"
            style="width:150px" placeholder="Meeting Number" class="form-control" required>
    </div>
    <div class="form-group">
        <input type="text" name="meeting_pwd" id="meeting_pwd" value="{{$data['meeting_pass']}}" style="width:150px"
            maxLength="32" placeholder="Meeting Password" class="form-control">
    </div>
    </div>
    <div class="form-group">
        <input type="hidden" name="meeting_email" id="meeting_email" value="" style="width:150px"
            maxLength="32" placeholder="Email option" class="form-control">
    </div>

    <div class="form-group">

    <input type="hidden" name="meeting_role" id="meeting_role" value="1" style="width:150px"
            maxLength="32" placeholder="Email option" class="form-control">
         
    </div>
    <div class="form-group">
    <input type="hidden" name="meeting_china" id="meeting_china" value="0" style="width:150px"
            maxLength="32" placeholder="Email option" class="form-control">
         
    </div>
    <div class="form-group">
    <input type="hidden" name="meeting_lang" id="meeting_lang" value="en-US" style="width:150px"
            maxLength="32" placeholder="Email option" class="form-control">
      
    </div>

    <input type="hidden" value="" id="copy_link_value" />
    <input type="hidden" value="{{$data['meeting_id']}}" id="meetingid_res" />
    <input type="hidden" value="{{$data['meeting_pass']}}" id="meetingpass_res" />
    <button type="submit" class="btn btn-primary" id="join_meeting">Join</button>
    <div style="display:none;">
    <button type="submit" class="btn btn-primary" id="clear_all">Clear</button>
    </div>

   


</form>



@endsection
@section('scripts')
<script>
    document.getElementById('show-test-tool-btn').addEventListener("click", function (e) {
        var textContent = e.target.textContent;
        if (textContent === 'Show') {
            document.getElementById('nav-tool').style.display = 'block';
            document.getElementById('show-test-tool-btn').textContent = 'Hide';
        } else {
            document.getElementById('nav-tool').style.display = 'none';
            document.getElementById('show-test-tool-btn').textContent = 'Show';
        }
    })

    document.ready(function(){
        console.log('document ok');
    });
</script>

    <script src="https://source.zoom.us/1.9.6/lib/vendor/react.min.js"></script>    
    <script src="https://source.zoom.us/1.9.6/lib/vendor/react-dom.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/redux.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/redux-thunk.min.js"></script>
    <script src="https://source.zoom.us/1.9.6/lib/vendor/lodash.min.js"></script>
    <script src="https://source.zoom.us/zoom-meeting-1.9.6.min.js"></script>
    <script src="{{ asset('public/dist/js/zoom/tool.js') }}"></script>
    <script src="{{ asset('public/dist/js/zoom/vconsole.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/zoom/index.js') }}"></script>

    <script>

        let mn = document.getElementById('meeting_number').value;      
           let pwd= document.getElementById('meeting_pwd').value; 
           let dn= "Harsha"; 
           testTool.setCookie("meeting_number", mn);
          testTool.setCookie("meeting_pwd", pwd);
          testTool.setCookie("display_name", dn);
        </script>
@endsection