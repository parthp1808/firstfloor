<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <title>First Floor</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">   
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nouislider.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/range.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/range2.css') }}"> 
    <!-- Theme color -->
    <link id="switcher" href="{{ asset('css/theme-color/default-theme.css') }}" rel="stylesheet">     

    <!-- Main style sheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">    

     @if (Route::getCurrentRoute()->uri() == '/')
          
          <style>
            
            #aa-menu-area .main-navbar {
              background-color: transparent;
              -webkit-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);;
              -moz-box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);;
              box-shadow: 0px 0px 0px 0px rgba(0,0,0,0);

            }
           
            #aa-menu-area {
              position: absolute;
            }
            #aa-menu-area .main-navbar .navbar-nav li a {
              color: #fff;
            }
          </style>

     @endif
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Vollkorn' rel='stylesheet' type='text/css'>    
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCKYD3Ng92QBY12d8PmR8vuRfZaV8NseZ0&sensor=false&amp;libraries=places"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('js/jquery.geocomplete.min.js') }}"></script>   
  <script src="{{ asset('js/range.js') }}"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body class="aa-price-range">  
  <!-- Pre Loader -->
  <div id="aa-preloader-area">
    <div class="pulse"></div>
  </div>
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-double-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  

  <!-- Start menu section -->
  <section id="aa-menu-area">
    <nav class="navbar navbar-default main-navbar" role="navigation">  
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->                                               
          <!-- Text based logo -->
           <a class="navbar-brand aa-logo" href="/"> First <span>Floor</span></a>
           <!-- Image based logo -->
           <!-- <a class="navbar-brand aa-logo-img" href="index.html"><img src="img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right aa-main-nav">
            <li class="active"><a href="/">Home</a></li>            
            <li><a href="/">Buy</a></li>
            <li><a href="/create-listing">Sell/Rent</a></li>
            @if (Route::has('login'))
                
                    @if (Auth::check())
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="padding-top: 10px; ">
                            <img src="/{{ Auth::user()->avatar }}" style="width:32px; height:32px; border-radius:50%">
                               {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/my-profile"><i class="fa fa-btn fa-user"></i> My Profile</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="fa fa-btn fa-sign-out"></i> Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="#" data-toggle="modal" data-target="#at-login">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        
                    @endif
                </div>
            @endif
           
          </ul>                            
        </div><!--/.nav-collapse -->       
      </div>          
    </nav> 
  </section>

      <section class="at-login-form">
        <!-- MODAL LOGIN -->
        <div class="modal fade" id="at-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <button class="btn-fb"> <i class="fa fa-fw fa-facebook pull-left" aria-hidden="true"></i>
                  Login with Facebook </button> <br>  
                  <button class="btn-gp"> <i class="fa fa-fw fa-google-plus pull-left" aria-hidden="true"></i>
                    Login with Google </button> <br>  
                    <div class="signup-or-separator">
                      <span class="h6 signup-or-separator--text">or</span>
                      <hr>
                    </div>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                      <div class="form-group">
                        <input id="email" type="email" class="form-control-form" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                      </div>
                      <div class="form-group">
                        <input id="password" type="password" class="form-control-form" name="password" placeholder="Password" required>
                      </div>
                      <div class="row"> 
                        <div class="col-md-6">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> Remember me
                            </label>
                          </div>  
                        </div>
                        <div class="col-md-4 col-md-offset-2">  
                          <p class="frgt-pswd"   data-toggle="modal" data-dismiss="modal"  data-target="#at-reset-pswd">  Forgot Password ?</p>
                        </div>
                      </div>
                      <button type="submit" class="btn-lgin">Login</button>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <div class="row"> 
                      <div class="col-md-6">
                        <p class="ta-l">Don't have an account ? </p>
                      </div>  
                      <div class="col-md-4 col-md-offset-2">  
                        <button class="btn-gst"  data-toggle="modal"  data-dismiss="modal" data-target="#at-signup" >Sign Up </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- MODAL LOGIN ENDS -->
           
              
                </section>
  <!-- End menu section -->

        @yield('content')
    <!-- Footer -->
  <footer id="aa-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="aa-footer-area">
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="aa-footer-left">
               <p>Developed by <a rel="nofollow" href="https://www.parthpatel.net/">Parth Patel</a></p>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="aa-footer-middle">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="aa-footer-right">
                <a href="#">Home</a>
                <a href="#">Support</a>
                <a href="#">License</a>
                <a href="#">FAQ</a>
                <a href="#">Privacy & Term</a>
              </div>
            </div>            
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / Footer -->

 
  
  <!-- jQuery library -->
 
  <!-- slick slider -->
  <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{ asset('js/nouislider.js') }}"></script>
  
  <!-- Custom js -->
  <script src="{{ asset('js/custom.js') }}"></script> 

  </body>
</html>
