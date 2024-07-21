<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themes.pixelstrap.net/pwa/mpay/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 May 2024 06:29:20 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="wallet app" />
  <meta name="keywords" content="wallet app" />
  <meta name="author" content="wallet app" />
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

  <link rel="stylesheet" id="rtl-link" type="text/css" href="{{asset('assets/css/vendors/bootstrap.min.css')}}" />
  @stack('styles')
  <style>
    .error{
      color:red;
    }
  </style>
  <link rel="stylesheet" id="change-link" type="text/css" href="{{asset('assets/css/style.css')}}" />
</head>

<body>
  <!-- side bar start -->
  <div class="offcanvas sidebar-offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft">
    <div class="offcanvas-header sidebar-header">
      <div class="sidebar-logo">
        <img class="img-fluid logo" src="{{asset('assets/images/logo/logo.png')}}" alt="logo" />
      </div>
      {{-- <div class="balance">
        <img class="img-fluid balance-bg" src="{{asset('assets/images/background/auth-bg.jpg')}}" alt="auth-bg" />
        <h5>Balance</h5>
        <h2>$1,06,786.65</h2>
      </div> --}}
    </div>
    <div class="offcanvas-body">
      <div class="sidebar-content">
        <ul class="link-section">
          <li>
            <a href="{{url('user/dashboard')}}" class="pages">
              <i class="sidebar-icon" data-feather="credit-card"></i>
              <h3>Dashboard</h3>
            </a>
          </li>
          <li>
            <a href="{{route('user.my-groups')}}" class="pages">
              <i class="sidebar-icon" data-feather="users"></i>
              <h3>Group</h3>
            </a>
          </li>
          
          
         
          {{-- <li>
            <a href="crypto.html" class="pages">
              <i class="sidebar-icon" data-feather="dollar-sign"></i>
              <h3>Payout</h3>
            </a>
          </li>
          <li>
            <a href="chatting.html" class="pages">
              <i class="sidebar-icon" data-feather="message-square"></i>
              <h3>Chat</h3>
            </a>
          </li>
          <li>
            <a href="crypto.html" class="pages">
              <i class="sidebar-icon" data-feather="info"></i>
              <h3>History</h3>
            </a>
          </li>
          <li>
            <a href="page-list.html" class="pages">
              <i class="sidebar-icon" data-feather="file-text"></i>
              <h3>Terms & Condition</h3>
            </a>
          </li>
          <li>
            <a href="page-list.html" class="pages">
              <i class="sidebar-icon" data-feather="help-circle"></i>
              <h3>Help & Support</h3>
            </a>
          </li>

          <li>
            <a href="profile.html" class="pages">
              <i class="sidebar-icon" data-feather="user"></i>
              <h3>Profile</h3>
            </a>
          </li> --}}

          <li>
            <a href="{{route('logout')}}" class="pages">
              <i class="sidebar-icon" data-feather="log-out"></i>
              <h3>Log out</h3>
            </a>
          </li>
        </ul>
        {{-- <div class="mode-switch">
          <ul class="switch-section">
           
            <li>
              <h3>Dark</h3>
              <div class="switch-btn">
                <input id="dark-switch" type="checkbox" />
              </div>
            </li>
          </ul>
        </div> --}}
      </div>
    </div>
  </div>
  <!-- side bar end -->

  <!-- header start -->
  <header class="section-t-space">
    <div class="custom-container">
      <div class="header-panel">
        <a class="sidebar-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
          <i class="menu-icon" data-feather="menu"></i>
        </a>
        <img class="img-fluid logo" src="{{asset('assets/images/logo/logo.png')}}" alt="logo" />

        <a href="notification.html" class="notification">
          <i class="notification-icon" data-feather="bell"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- header end -->

  <div>
    @yield('section')  
  </div>

  <!-- panel-space start -->
  <section class="panel-space"></section>
  <!-- panel-space end -->

 

  <!-- bottom navbar start -->

  <div class="navbar-menu">
   
    <ul>
      <li class="active">
        <a href="landing.html">
          <div class="icon">
            <img class="unactive" src="{{asset('assets/images/svg/mpay.svg')}}" alt="mPay" />
            <img class="active" src="{{asset('assets/images/svg/mpay-fill.svg')}}" alt="mPay" />
          </div>
          <h5 class="active">mPay</h5>
        </a>
      </li>

      <li>
        <a href="crypto.html">
          <div class="icon">
            <img class="unactive" src="{{asset('assets/images/svg/bitcoin.svg')}}" alt="categories" />
            <img class="active" src="{{asset('assets/images/svg/bitcoin-fill.svg')}}" alt="categories" />
          </div>
          <h5>Crypto</h5>
        </a>
      </li>

      <li></li>

      <li>
        <a href="insight.html">
          <div class="icon">
            <img class="unactive" src="{{asset('assets/images/svg/bar-chart.svg')}}" alt="bag" />
            <img class="active" src="{{asset('assets/images/svg/bar-chart-fill.svg')}}" alt="bag" />
          </div>
          <h5>Insight</h5>
        </a>
      </li>

      <li>
        <a href="profile.html">
          <div class="icon">
            <img class="unactive" src="{{asset('assets/images/svg/user.svg')}}" alt="profile" />
            <img class="active" src="{{asset('assets/images/svg/user-fill.svg')}}" alt="profile" />
          </div>
          <h5>Profile</h5>
        </a>
      </li>
    </ul>
  </div>
   <!-- feather js -->
   <script src="{{asset('assets/js/feather.min.js')}}"></script>
   <script src="{{asset('assets/js/custom-feather.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.js')}}"></script>
  <script src="{{asset('assets/js/script.js')}}"></script>
  @stack('scripts')
</body>

</html>