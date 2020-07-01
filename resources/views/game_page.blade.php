@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')
<link rel="stylesheet" href="{{asset(url('static_css/game_page.css'))}}">

<!-- Main Section -->
<div class="game_main">
    <div class="game_main_content text-center">
        <!-- Main heading and content -->
        <h1 class="text-white display-4 mt-3">Online Gaming Tournament</h1>
        <h5 class="text-white p-2"><span class="come">Come</span> <span class="with">with</span></h5>
        <h1 class="text-white">World's Best Multiplayer Battle Royale</h1>
        <!-- Slider -->
        <div class="slide_nameofgame mx-auto">
            <div class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h2>Player's Unknown Battle Ground</h2>
                    </div>
                    <div class="carousel-item">
                        <h2>Call of Duty</h2>
                    </div>
                    <div class="carousel-item">
                        <h2>FORTNITE</h2>
                    </div>

                    <div class="carousel-item">
                        <h2>Free Fire Arena</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- primary content -->
<section class="section-stories">
    <div class="bg-video">
        <video class="bg-video__content" autoplay="" muted="" loop="">
            <source src="{{asset(url('Video/s2-hero-vid-desktop.mp4'))}}" type="video/mp4">
            Your Browser doesn't support video !
        </video>
    </div>
    <div class="text-center">
        <h2 class="video_heading_content display-4">
            THE WAR RAGES ON.
        </h2>
        <p class="w-75 mx-auto">
            Featuring gritty, grounded, fluid Multiplayer combat, where the universe of player's comes to life in one massive battle royale experience. Soldier up for all-out combat – tailor made for the community.
        </p>
    </div>
</section>


<section class="current_notify pt-5 pb-5">
    <div class="content text-center">
        <h1 class="display-4">Play your game</h1>
        <p>
            Currently we are supporting the following games, but more will be added as we move forward.
        </p>
    </div>
</section>


<!-- Body Content -->
<!-- PUBG MOBILE -->

<!-- PUBG / 1st parallax -->
<section class="first-parallax">
    <div class="first-parallax-heading">
        <h1>PLAYER UNKNOWN'S BATTLEGROUND</h1>
    </div>
</section>

<!-- First game Section -->
<section class="game-section game-section-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left_game-section">
                    <div class="text_outer-shape"></div>
                    <div class="text">PUBG</div>
                    <div class="btn_overlay">
                        <a href="{{url('tournament')}}" class="btn btn-danger">Get to the play zone</a>
                    </div>
                    <div class="overlay">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 right_section">
                <div class="right_game-section">
                    <h2 class="display-4">About The Game</h2>
                    <p class="text-justify pt-5">
                        PUBG (Player Unknown's Battle Grounds 2017) is a player-versus-player shooter in which up to 100 players fight to survive in a battle royale match. The game's creator Brendan Greene pioneered this genre which is a type of large scale, last man standing,
                        deathmatch in which players fight to be the last alive. Players can choose to enter a match solo, as a duo or with a small team of up to four people. The game is titled PlayerUnknown after Greene's alias when he created a battle
                        royale mod called ARMA II for the game Day Z. PUBG is available on Microsoft Windows, XboxOne, Android, iOS and Playstation 4.
                    </p>

                    <a style="z-index: 111;" href="{{url('tournament')}}" class="btn btn-danger">Find Tournament</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Fortnite / 2nd Parallax -->
<section class="second-parallax">
    <div class="first-parallax-heading">
        <h1>FORTNITE BATTLE ROYALE</h1>
    </div>
</section>

<!-- FORTNITE MOBILE -->
<section class="game-section game-section-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left_game-section">
                    <div class="text_outer-shape"></div>
                    <div class="text">FORTNITE</div>
                    <div class="btn_overlay">
                        <a href="{{url('tournament')}}" class="btn btn-danger">Get to the play zone</a>
                    </div>
                    <div class="overlay">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 right_section">
                <div class="right_game-section">
                    <h2 class="display-4">About The Game</h2>
                    <p class="text-justify pt-5">
                        PUBG (Player Unknown's Battle Grounds 2017) is a player-versus-player shooter in which up to 100 players fight to survive in a battle royale match. The game's creator Brendan Greene pioneered this genre which is a type of large scale, last man standing,
                        deathmatch in which players fight to be the last alive. Players can choose to enter a match solo, as a duo or with a small team of up to four people. The game is titled PlayerUnknown after Greene's alias when he created a battle
                        royale mod called ARMA II for the game Day Z. PUBG is available on Microsoft Windows, XboxOne, Android, iOS and Playstation 4.
                    </p>

                    <a href="{{url('tournament')}}" class="btn btn-danger">Find Tournament</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- COD MOBILE / 3rd parallax  -->
<section class="third-parallax">
    <div class="first-parallax-heading">
        <h1>CALL OF DUTY</h1>
    </div>
</section>

<!-- COD MOBILE -->
<section class="game-section game-section-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left_game-section">
                    <div class="text_outer-shape"></div>
                    <div class="text">FORTNITE</div>
                    <div class="btn_overlay">
                        <a href="{{url('tournament')}}" class="btn btn-danger">Get to the play zone</a>
                    </div>
                    <div class="overlay">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 right_section">
                <div class="right_game-section">
                    <h2 class="display-4">About The Game</h2>
                    <p class="text-justify pt-5">
                        PUBG (Player Unknown's Battle Grounds 2017) is a player-versus-player shooter in which up to 100 players fight to survive in a battle royale match. The game's creator Brendan Greene pioneered this genre which is a type of large scale, last man standing,
                        deathmatch in which players fight to be the last alive. Players can choose to enter a match solo, as a duo or with a small team of up to four people. The game is titled PlayerUnknown after Greene's alias when he created a battle
                        royale mod called ARMA II for the game Day Z. PUBG is available on Microsoft Windows, XboxOne, Android, iOS and Playstation 4.
                    </p>

                    <a href="{{url('tournament')}}" class="btn btn-danger">Find Tournament</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Free Fire / 4th parallax -->
<section class="fourth-parallax">
    <div class="first-parallax-heading">
        <h1>FREE FIRE GARENA</h1>
    </div>
</section>

<!-- Free Fire Mobile -->
<section class="game-section game-section-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="left_game-section">
                    <div class="text_outer-shape"></div>
                    <div class="text">FORTNITE</div>
                    <div class="btn_overlay">
                        <a href="{{url('tournament')}}" class="btn btn-danger">Get to the play zone</a>
                    </div>
                    <div class="overlay">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 right_section">
                <div class="right_game-section">
                    <h2 class="display-4">About The Game</h2>
                    <p class="text-justify pt-5">
                        PUBG (Player Unknown's Battle Grounds 2017) is a player-versus-player shooter in which up to 100 players fight to survive in a battle royale match. The game's creator Brendan Greene pioneered this genre which is a type of large scale, last man standing,
                        deathmatch in which players fight to be the last alive. Players can choose to enter a match solo, as a duo or with a small team of up to four people. The game is titled PlayerUnknown after Greene's alias when he created a battle
                        royale mod called ARMA II for the game Day Z. PUBG is available on Microsoft Windows, XboxOne, Android, iOS and Playstation 4.
                    </p>

                    <a href="{{url('tournament')}}" class="btn btn-danger">Find Tournament</a>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{asset(url('JavaScript/login.js'))}}"></script>
<script src="{{asset(url('JavaScript/Home.js'))}}"></script>

@endsection

@section('footer')

@parent

@endsection