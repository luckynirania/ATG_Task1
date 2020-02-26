@extends('layouts.app')

@section('content')
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Laravel 5.7 Ajax Form Submission Example - Tutsmake.com</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <style>
   .error{ color:red; } 
  </style>
</head>
  
<body>
  
<div class="container">
    <h2 style="margin-top: 10px;">Add Entry</h2>
    <br>
    <br>
    <form id="contact_us" method="post" action="javascript:void(0)">
      @csrf
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
        <span class="text-danger" id="name-error"></span>
      </div>
      <div class="form-group">
        <label for="email">Email Id</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
        <span class="text-danger" id="email-error"></span>
      </div>   
      <div class="form-group">
        <label for="pincode">PINCODE</label>
        <input type="text" name="pincode" class="form-control" id="pincode" placeholder="Please enter pincode" maxlength="10">
        <span class="text-danger" id="pincode-error"></span>
      </div>  
      <div class="form-group">
       <button type="submit" id="send_form" class="btn btn-success">Submit</button>
       <h3 id="loki" ></h3>
      </div>
    </form>
    
  
</div>
<script>
   if ($("#contact_us").length > 0) {
    $("#contact_us").validate({
    submitHandler: function(form) {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $("#name-error").html("");
        $("#email-error").html("");
        $("#pincode-error").html("");
        $("#loki").html("");
        $("#send_form").html("Sending...");
      $.ajax({
        url: '/api/adduser' ,
        type: "POST",
        data: $('#contact_us').serialize(),
        success: function( response ) {
            if(response.status == 0) {
                var resp = ''
                resp += response.error.name + "<br>";
                resp += response.error.email + "<br>";
                resp += response.error.pincode + "<br>";
                $("#name-error").html(response.error.name);
                $("#email-error").html(response.error.email);
                $("#pincode-error").html(response.error.pincode);
            }
            else {
                $("#loki").html(response.msg);
            }
        }
        $("#send_form").html("Submit");        
      });
    }
  })
}
</script>
</body>

@endsection