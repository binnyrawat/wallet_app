<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Wallet" />
  <meta name="keywords" content="Wallet" />
  <meta name="author" content="Wallet" />
  {{-- <link rel="manifest" href="manifest.json" /> --}}
  <link rel="icon" href="{{asset('assets/images/logo/favicon.png')}}" type="image/x-icon" />
  <title>Wallet App</title>
  <link rel="apple-touch-icon" href="{{asset('assets/images/logo/favicon.png')}}" />
  <meta name="theme-color" content="#122636" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-status-bar-style" content="black" />
  <meta name="apple-mobile-web-app-title" content="mpay" />
  <meta name="msapplication-TileImage" content="{{asset('assets/images/logo/favicon.png')}}" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!--Google font-->
  <link rel="preconnect" href="https://fonts.googleapis.com/" />
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&amp;display=swap" rel="stylesheet" />
  <!-- bootstrap css -->
  <link rel="stylesheet" id="rtl-link" type="text/css" href="{{asset('assets/css/vendors/bootstrap.min.css')}}" />
  <!-- Theme css -->
  <link rel="stylesheet" id="change-link" type="text/css" href="{{asset('assets/css/style.css')}}" />
  
  <style>
    .error{
        color:red;
    }
  </style>
</head>

<body class="auth-body">
  <!-- header starts -->
  <div class="auth-header">

    <img class="img-fluid img" src="{{asset('assets/images/authentication/6.svg')}}" alt="v1" />

    <div class="auth-content">
      <div>
        <h2>Welcome Back</h2>
        <h4 class="p-0">Login to continue</h4>
      </div>
    </div>
  </div>
  <!-- header end -->

  <!-- login section start -->
  <form class="auth-form" action="{{route('checkLogin')}}" id="register_frm" name="register_frm" method="post">
    @csrf
    <div class="custom-container">
        @include('messages')
        @stack('styles')
     

      <div class="form-group">
        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
        <div class="form-input">
          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter Your Email" required/>
        </div>
      </div>


      <div class="form-group">
        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
        <div class="form-input">
          <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required />
        </div>
      </div>
      <button type="submit" class="btn theme-btn w-100">Sign In</button>
      <h4 class="signup">Don't have an account ?<a href="{{route('sign-up')}}"> Sign up</a></h4>
    </div>
  </form>

  <script src="{{asset('assets/js/jquery.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
  
  <script> 
    $("#register_frm").validate({
        rules: {
           
        },
        messages: {
            
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            if (element.attr("type") == "checkbox") {
                error.insertAfter($("#terms_err"));
            } else {
                error.insertAfter(element);
            }
           
        },
        highlight: function(element, errorClass) {
            $(element).css({ border: '1px solid #f00' });
        },
        unhighlight: function(element, errorClass) {
            $(element).css({ border: '1px solid #c1c1c1' });
        },
        submitHandler: function(form,event) {
            document.register_frm.submit();
            $('button[type="submit"]').attr('disabled','disabled').text('Processing...');
        }
    });
</script>
</body>
</html>