<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset(url('css/bootstrap.css'))}}">
    <script src="{{asset(url('Jquery/jquery-3.4.1.js'))}}"></script>
    <script src="{{asset(url('js/bootstrap.js'))}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset(url('organizer/Org_navbar.css'))}}">
    <link rel="stylesheet" href="{{asset(url('organizer/sidebar.css'))}}">
    <link rel="stylesheet" href="{{asset(url('Font/fontawesome-free-5.12.0-web/css/all.css'))}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>

<body>
    <!-- Navbar -->
    @section('navbar')
    <div class="main_navbar">
        <nav class="navbar navbar-expand-lg navbar-mainbg">
            <a class="navbar-brand navbar-logo" href="#">Bloodshed</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars text-white"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <div class="hori-selector">
                        <div class="left"></div>
                        <div class="right"></div>
                    </div>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('organizer_dashboard')}}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('organizer_profile')}}">
                        <i title="Activity" class="fab fa-readme"></i> My Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('organizer_profile')}}">
                        <i title="Activity" class="fab fa-readme"></i> Edit Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('logout')}}">
                        <i title="Logout" class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
                <div class="nav-item profile_navbar d-flex ml-auto" style="width: 20%;">
                @php $profile = Session::get('session_profile'); @endphp
                    <div class="profile">
                        <img src='{{asset(url("profile_image/$profile"))}}' style="height: 100%; width: 100%;" alt="">
                    </div>
                    <div class="profile_info text-white pl-2">
                        <span class="username d-block">{{Session::get('username')}}</span>
                        <span class="user_status d-block position-relative">ONLINE</span>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    @show

  

    @yield('main_content')
</body>

</html>