@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')

<!-- Navbar -->
<link rel="stylesheet" href="../static_css/about_us1.css">

<!-- Body Content -->

<div class="container-fluid first-section">
    <div class="row px-0">
        <div class="col-12 px-0">
            <div class="first-section-inner">
                <h1 class="">PLAY -> WIN -> REPEAT</h1>
                <p class="">We’re changing the way people are connected by games.</p>
                <div class="abtusshowbtn">
                    <a href="#show" class="btn btn1">
                        <span>Show Me How</span>
                        <i class="fas fa-arrow-alt-circle-right i1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Second Section -->
<div class="container-fluid px-0 two-section">
    <div class="row r2 px-0 mx-0" id="show">
        <div class="col-12 mx-auto text-center px-0">
            <h1 class="overview">Overview</h1>
            <h4 class="text-white">What is OGT?</h4>
            <p class="text-white">OGT is a global esports and gaming tournament platform. Whether you are an esports organization, professional team or an individual gamer, OGT is the perfect platform to find like-minded gamers to compete in traditional multiplayer matches
                or professional tournaments.</p>
        </div>
    </div>
</div>

<!-- Third-section -->
<div class="container-fluid third-section p-0 m-0">
    <div class="row m-0 p-0">
        <!-- visible at small screen  -->
        <div class="col-md-6 p-0 d-block d-md-none">
            <div class="abtimg2">
                <img src="images/homepage-zombies-bg.jpg" alt="">
            </div>
        </div>
        <div class="col-md-6 row-2 p-0">
            <div class="r2c2 text-white">
                <h4 class="">PLAY – WIN – REPEAT!</h4>
                <p>The road to professional gaming maybe shorter than you think!</p>
                <p>If you consider yourself a progamer and you’re thirsting to prove your mettle, OGT tournaments are a good way get started. Achieve glory for yourself and your team and you might even get scouted by a serious esports brand!</p>
            </div>
        </div>
        <!-- not visible at small screen -->
        <div class="col-md-6 p-0  d-none d-md-block">
            <div class="abtimg2">
                <img src="images/homepage-zombies-bg.jpg" alt="">
            </div>
        </div>
    </div>
</div>

<!-- fourth section -->
<div class="container-fluid p-0 fourth-section">
    <div class="row p-0 m-0">
        <div class="col-md-6 p-0">
            <div class="abtimg2">
                <img class="img-fluid" src="images/ff3.jpg" alt="">
            </div>
        </div>
        <!-- --------------------- -->
        <div class="col-md-6 p-0 row-3">
            <div class="r2c2 text-white">
                <h4 class="">Become an esports entrepreneur!</h4>
                <p>If you are driven to host gaming events, tournaments and leagues, then OGT is the perfect platform to hone your entrepreneurial skills. Host matches and tournaments with our platform and grow your own gaming communities!</p>
                <p>Become a verified OGT host and manage complex gaming leagues with gamer participation from across the globe! Become an esports legend!</p>
            </div>
        </div>
    </div>
</div>

<!-- fifth-section -->
<div class="container-fluid" style="background-color: #192231;">
    <div class="row">
        <div class="col-md-6 px-0 d-block d-md-none">
            <div class="abtimg2">
                <img class="img-fluid" src="images/abtusimg4.jpg" alt="">
            </div>
        </div>
        <div class="col-md-6 p-0 row-4">
            <div class="r2c2 text-white">
                <h4 class="">Pick your poison!</h4>
                <p>OGT supports a wide variety of competitive games from Fortnite, PlayerUnknown’s Battlegrounds, Free Fire, Call of Duty. Choose from a wide selection of single matches, tournaments and leagues to participate in.</p>
            </div>
        </div>
        <!-- not visible at small -->
        <div class="col-md-6 px-0 d-none d-md-block">
            <div class="abtimg2">
                <img class="img-fluid" src="images/abtusimg4.jpg" alt="">
            </div>
        </div>
    </div>
</div>

<!-- sixth section -->
<div class="container-fluid sixth-section text-center" style="background-color: #212830;">
    <div class="row-2">
        <div class="col-md-12 text-center r2c8 text-white ">
            <h3 class=" ">3 swipes to Play!</h3>
            <p class=" ">Select your game, select your tournament host and you’re ready to play!</p>
        </div>

        <div class="col-md-12 px-0 ">
            <div class="abtusbgimg1 " id="abtbgimg2 ">
                <div class="overlay " id="overlay2 "></div>
            </div>
            <div class="bgimg2caption text-white ">
                <h2>Manage your team and focus on your game!</h2>
                <p>The OGT platform supports a rich social media experience so that you can stay up to date with all the latest tournaments and esports content. Enable push notifications for your favorite games and hosts to never miss a chance to crush
                    your competition!</p>
                <p>Create team pages with your friends and teammates to notify them seamlessly for upcoming tournaments! Manage your team as a team manager and deploy active players with the OGT team management functionalities.</p>
            </div>
        </div>
    </div>
</div>

<script src="{{asset(url('JavaScript/login.js'))}}"></script>
<script src="{{asset(url('JavaScript/Home.js'))}}"></script>

@endsection

@section('footer')

@parent

@endsection