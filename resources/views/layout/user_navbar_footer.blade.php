<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Gaming Tournament</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <script src="{{asset('Jquery/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <link rel="stylesheet" href="{{asset('Font/fontawesome-free-5.12.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('static_css/header.css')}}">
    <link rel="stylesheet" href="{{asset('static_css/foot.css')}}">
    <link rel="stylesheet" href="{{asset('static_css/login.css')}}">
    <link rel="stylesheet" href="{{asset('static_css/hamburger.css')}}">
</head>

<body>

    @section('navbar')
    <!-- Jumbotron -->
    <div class="p-0 m-0">

        <!-- Navbar -->
        <div class="header_img_area d-none d-lg-block position-fixed w-100" style="z-index: 10000;">
            <!-- upper navbar icon -->

            <div class="primary-navbar" id="primary-navbar">
                <div class="header-icon">
                    <!-- Social Icon -->
                    <div class="header_social d-inline-block">
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>

                    <!-- Login and register place -->
                    <div class="access navbar p-0 pr-5 navbar-expand d-inline-block">
                        <ul class="navbar-nav">
                            <!-- Login -->
                            <li class="nav-item">


                                @if(Session::get('username'))
                                <a href='#!' class='nav-link'><span class=''>{{Session::get('username')}}</span></a>
                                @else
                                <a href="" data-toggle="modal" id="modal_link" data-target="#login_modal" class="nav-link">
                                    <span class="login_icon p-0 pr-3">
                                        <img src="{{asset('images/login-icon.png')}}" alt="">
                                    </span>
                                    <span class='login_button'>Login</span>
                                </a>
                                @endif
                            </li>

                            <li class="nav-item">
                                @if(Session::get('username'))

                                <a href="{{url('logout')}}" class="nav-link"><span class=''>Logout</span></a>
                                @else
                                <a href="" data-toggle="modal" id="modal_link" data-target="#login_modal" class="nav-link">
                                    <span class="reg_icon p-0 pr-3">
                                        <img src="{{asset('images/reg-icon.png')}}" alt="">
                                    </span>
                                    <span class='login_button'>Register</span>
                                </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Upper Navbar Icon's -->
            <!-- This div use for left and right image -->
            <div class="bg-pos"></div>
            <div class="header_outer_area" id="header_outer_area">
                <a id="xs-navbar-brand" href="#" class="navbar-brand nav-brand-xs w-100 d-block position-fixed d-lg-none">
                    <img src="https://www.iglnetwork.com/assets/images/logo.png" class="d-block mx-auto" alt="Brand Image">
                </a>
                <header id="navbar-header" class="main-navbar navbar navbar-expand-lg ">
                    <button id="navbar-toggle" class="navbar-toggler navbar-light" data-target='#navbar-hide' data-toggle="collapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" style="top: 54px;" id="navbar-hide">
                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                        <ul class="navbar-nav first w-100 m-0" id="left-navbar">
                            <div class="left-navbar mx-auto navbar-nav">
                                <li class="nav-item"><a href="{{asset(url('/'))}}" class="nav-link">Home</a></li>
                                <li class="nav-item"><a href="{{asset(url('/game'))}}" class="nav-link">Games</a></li>
                                <li class="nav-item"><a href="{{asset(url('/tournament'))}}" class="nav-link">Events</a></li>
                            </div>
                        </ul>
                        <!-- Navbar Brand  -->
                        <div class="nav-brand-div">
                            <a href="#!" class="brnd-pos navbar-brand d-none position-absolute d-lg-block mx-auto">
                                <img src="https://www.iglnetwork.com/assets/images/logo.png" alt="">
                            </a>
                        </div>
                        <!-- Navbar Right Content when large screen appear -->

                        <ul class="navbar-nav first w-100 m-0" id="right-navbar">
                            <div class="right-navbar mx-auto navbar-nav">
                                <li class="nav-item"><a href="{{asset(url('/leaderboard'))}}" class="nav-link">Leaderboard</a></li>
                                <li class="nav-item"><a href="{{asset(url('/about'))}}" class="nav-link">About Us</a></li>
                                <li class="nav-item"><a href="{{asset(url('/contact'))}}" class="nav-link">Contact</a></li>
                                @if(Session::has('username'))
                                <li class="nav-item dropdown">
                                    <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown">Profile
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{url('user_dashboard')}}">My Profile</a>
                                        <a class="dropdown-item" href="{{url('mymatches')}}">My Matches</a>
                                        <a class="dropdown-item" href="{{url('show_edit_profile')}}">Edit Profile</a>

                                    </div>
                                </li>
                                @endif
                                <li class="nav-item"><a href="#" class="nav-link d-lg-none">Login</a></li>
                                <li class="nav-item"><a href="#" class="nav-link d-lg-none">Register</a></li>
                            </div>
                        </ul>
                    </div>
                </header>
            </div>
        </div>
    </div>

    <!-- Hamburger For Small Screen -->
    <!-- Hamburger menu for small screen -->
    <div class="navigation d-lg-none d-block">
        <!-- navigation checkbox illusion -->
        <input type="checkbox" class="navigation__checkbox" id="navi-toggle">
        <label for="navi-toggle" class="navigation__button">
            <span class="navigation__icon">&nbsp;</span>
        </label>

        <!-- Navigation Background -->
        <div class="navigation__background">&nbsp;</div>
        <!-- Navigation List -->
        <nav class="navigation__nav">

            <ul class="navigation__list">
                <li class="navigation__item"><a href="#" class="navigation__link"><span>01</span>Home</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>02</span>Games</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>03</span>Events</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>04</span>Leaderboard</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>05</span>About us</a></li>
                <li class="navigation__item"><a href="#" class="navigation__link"><span>06</span>Contact us</a></li>
            </ul>

            <ul class="navs mx-auto text-center">
                <li class="nav-item d-inline"><a href="#!" class="nav-link navigation__link" data-toggle="modal" id="modal_link" data-target="#login_modal">Login</a></li>
                <li class="nav-item d-inline"><a href="#!" class="nav-link navigation__link" data-toggle="modal" id="modal_link" data-target="#login_modal">Register</a></li>
            </ul>
        </nav>
    </div>

    @show

    @yield('main_content')

    @section('login_signup')
    <div class="modal fade" id="login_modal" style="z-index: 11111" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background-color: transparent !important; margin-top: -10px;">

                <div class="modal-body">
                    <div class="content">
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#regis">Register</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="login" class="container tab-pane active">
                               
                                <form action="{{url('login_form')}}" method="POST" class="mt-3">
                                    @csrf()
                                    <div class="div form-group">
                                        <label for="">Email address</label>
                                        <input class="form-control" type="email" name="login_email" id="login_email" placeholder="name@example.com" required>
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="div form-group">
                                        <label for="">Password</label>
                                        <input class="form-control" type="password" name="login_password" id="login_password" placeholder="Password" required>
                                        <small id="emailHelp" class="form-text text-muted">Password incorrect.</small>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                        <label class="custom-control-label" for="customCheck">I agree to
                                            the<b> Term of User</b></label>
                                    </div>
                                    <a href="{{url('emailcheck')}}">Forget Password</a>
                                    <div class="row">
                                        <button type="submit" class="btn btn-info" id="login_button">Login</button>
                                        <button type="buttom" class="btn btn-danger" id="close" data-dismiss="modal">close</button>
                                    </div>

                                </form>
                            </div>
                            <div id="regis" class="container tab-pane fade">
                                <h3 class="form__heading text-center"> Create Account</h3>
                                <h2 class="text-center">with Social Media</h2>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{url('redirect')}}" class="btn google btn">
                                                <i class="fab fa-google-plus-g"></i> Login With Google
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{url('registration')}}" method="post" class="form" enctype="multipart/form-data">
                                    @csrf()
                                    <p class="">or use your email for registeration</p>

                                    <div class="form-group">
                                        <label for="">Upload profile photo</label>
                                        <input type="file" class="form-control" name="image" id="" autocomplete="true" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" placeholder="gagan007soul" class="form-control" name="username" id="username" autocomplete="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email address</label>
                                        <input type="email" placeholder="name@example.com" class="form-control" id="email" name="email" autocomplete="true">
                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" placeholder="Password" class="form-control" id="password" name="password" autocomplete="true">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Which type you wanna choose.</label>
                                        <select name="type" id="role" class="form-control">
                                            <option value="user">User</option>
                                            <option value="organizer">Organizer</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-secondary" id="registeration">Sign Up</button>
                                    <button type="buttom" class="btn btn-danger" id="close" data-dismiss="modal">close</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @show


    @section('footer')

    <!-- Footer -->
    <!-- Footer -->
    <footer>
        <!-- Icons -->
        <div class="icons text-white">
            <ul class="nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
        <hr>

        <!-- For lg snd up screen -->
        <div class="container-fluid">
            <div class="row p-0 m-0">
                <!-- First Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>Bloodshed</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="{{url('/')}}">Dashboard</a></li>
                                <li><a href="{{url('leaderboard')}}">Leaderboards</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -> Hide on large or wider screen -->
                    <div id="accordion" class="d-lg-none">
                        <div class="card">
                            <div class="card-header">
                                <a href="#OG" data-toggle="collapse" class="card-link d-block">Bloodshed</a>
                            </div>
                            <div id="OG" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="{{url('/')}}" class="nav-link text-white pl-5">Dashboard</a></li>
                                    <li class="nav-item"><a href="{{url('leaderboard')}}" class="nav-link pl-5 text-white">Leaderboards</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>COMMUNITY</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="{{url('about')}}">About</a></li>
                                <li><a href="{{url('contact')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -->
                    <div id="accordion" class="d-lg-none">
                        <div class="card">
                            <div class="card-header">
                                <a href="#community" data-toggle="collapse" class="card-link d-block">COMMUNITY</a>
                            </div>
                            <div id="community" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="{{url('about')}}" class="nav-link pl-5 text-white">About</a></li>
                                    <li class="nav-item"><a href="{{url('contact')}}" class="nav-link pl-5 text-white">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>SUPPORT</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="{{url('privacy')}}">Privacy Policy</a></li>
                                <li><a href="{{url('terms')}}">Terms of Service</a></li>
                                <li><a href="{{url('legality')}}">Legality</a></li>
                                <li><a href="{{url('feedback_form')}}">Feedback</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -->
                    <div id="accordion" class="d-lg-none">
                        <div class="card">
                            <div class="card-header">
                                <a href="#support" data-toggle="collapse" class="card-link d-block">SUPPORT</a>
                            </div>
                            <div id="support" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="{{url('privacy')}}">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="{{url('terms')}}">Terms of
                                            Service</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="{{url('legality')}}">Legality</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="{{url('feedback_form')}}">Legality</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fourth Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>FOLLOW US</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="#!">Facebook</a></li>
                                <li><a href="#!">Twitter</a></li>
                                <li><a href="#!">YouTube</a></li>
                                <li><a href="#!">Instagram</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -->
                    <div id="accordion" class="d-lg-none w-100 bg-danger">
                        <div class="card w-100 bg-danger">
                            <div class="card-header">
                                <a href="#follow" data-toggle="collapse" class="card-link d-block">FOLLOW US</a>
                            </div>
                            <div id="follow" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Twitter</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">YouTube</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @show
</body>

</html>