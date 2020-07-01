@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')

<link rel="stylesheet" href="{{asset('static_css/style.css')}}">
<link rel="stylesheet" href="{{asset('static_css/alert_modal.css')}}">
<!-- Registratiojn error -->
@if($errors->any())
<div class="modal fade show" id="error">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-header">
            <a href="" class="close" data-dismiss="#error">&times</a>
        </div>
        <div class="modal-content">
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" style="height: 40vh">
                {{$error}}
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif

<!-- Successfull registration message -->
@if(session()->has('register'))
<!-- Modal -->
<div id="message" class="modal fade">
    <div class="modal-dialog modal-confirm  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="far fa-check"></i>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body text-center">
                <h4>Great!</h4>
                <p>Your account has been created successfully.</p>
                <button class="btn btn-success" data-dismiss="modal"><span>Start Exploring</span> <i class="material-icons">&#xE5C8;</i></button>
            </div>
        </div>
    </div>
</div>

@elseif(session()->has('unauthorized'))
<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-2 alert-danger">
                {{session()->get('unauthorized')}}
            </div>
        </div>
    </div>
</div>

@elseif(session()->has('email_exists_google'))
<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-2 alert-danger text-danger">
                {{session()->get('email_exists_google')}}
            </div>
        </div>
    </div>
</div>

@endif
<script>
    $('#message').modal("show");

    // setTimeout(() => {
    //     $('#message').modal("hide");
    // }, 10000);
</script>

<!-- Google Modal -->
@if(Session::has('google_email'))
<div class="modal fade" id="complete_registration" tabindex="-1" role="dialog" style="z-index: 11111;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Complete Your Credential Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('complete_registration_form')}}" method="post" class="form">
                    @csrf()
                    <p class="">or use your email for registeration</p>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" placeholder="gagan007soul" class="form-control" name="username" id="username" pattern="^\S+$" autocomplete="true">

                    </div>
                    @if(Session::has('google_email'))
                    <div class="form-group">
                        <label for="">Email address</label>
                        <input type="email" placeholder="name@example.com" value="{{Session::get('google_email')}}" class="form-control" name="email" id="email" autocomplete="true" readonly>
                        <input type="hidden" value="{{Session::get('provider_user_id')}}" class="form-control" name="provider_id" autocomplete="true" readonly>
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" placeholder="Password" class="form-control" name="password" id="password" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autocomplete="true">

                    </div>
                    <div class="form-group">
                        <label for="">Which type you wanna choose.</label>
                        <select name="type" id="role" class="form-control">
                            <option value="user">User</option>
                            <option value="organizer">Organizer</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary" id="registeration">Sign Up</button>
                    <button type="button" class="btn btn-danger" id="close">close</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#complete_registration').modal("show");
</script>
@endif
<!-- Home Page Carousel -->

<!-- Jumbotron -->
<div class="jumbotron p-0 m-0">
    <!-- Slider Section -->
    <div class="container-fluid">
        <!-- Row One -->
        <div class="row">
            <div class="col-md-12 px-0">
                <!-- Carousel -->
                <div class="carousel slide carousel-fade cc" data-ride="carousel" id="car">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#car" data-slide-to="0">1</li>
                        <li data-target="#car" data-slide-to="1">2</li>
                        <li data-target="#car" data-slide-to="2">3</li>
                        <li data-target="#car" data-slide-to="3">4</li>
                    </ol>
                    <!-- End of Indicators -->
                    <div class="carousel-inner text-center text-uppercase cimg">
                        <!-- Image1 -->
                        <div class="carousel-item active">
                            <div class="images">
                                <div class="img-fluid1" id="img-1">

                                </div>
                                <div class="overdiv"></div>
                                <!-- Carousel Caption -->
                                <div class="carousel-caption">
                                    <h3 class="d-block mx-auto text-center">
                                        BLOODSHED <br> GET READY FOR WAR
                                    </h3>
                                    <p class="text-center pbtn mt-4">
                                        @if(Session::has('username'))

                                        <a href="{{url('tournament')}}" class="btn btn_red text-uppercase">
                                            <span class="s2">Browse Tournament</span>
                                        </a>

                                        @else

                                        <a data-toggle="modal" data-target="#login_modal" class="btn btn_red text-uppercase">
                                            <span class="s2">Register Now!</span>
                                        </a>
                                        <a data-toggle="modal" data-target="#login_modal" href="" class="btn btn_red text-uppercase">
                                            <span class="s2">Login</span>
                                        </a>

                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Image2 -->
                        <div class="carousel-item">
                            <div class="img-fluid1" id="img-2">

                            </div>
                            <div class="overdiv"></div>
                            <!-- Carousel Caption -->
                            <div class="carousel-caption">
                                <h3>BLOODSHED <br> GET READY FOR WAR</h3>
                                <p class="text-center pbtn">
                                    @if(Session::has('username'))

                                    <a href="{{url('tournament')}}" class="btn btn_red text-uppercase">
                                        <span class="s2">Browse Tournament</span>
                                    </a>

                                    @else

                                    <a data-toggle="modal" data-target="#login_modal" class="btn btn_red text-uppercase">
                                        <span class="s2">Register Now!</span>
                                    </a>
                                    <a data-toggle="modal" data-target="#login_modal" class="btn btn_red text-uppercase">
                                        <span class="s2">Login</span>
                                    </a>

                                    @endif
                                </p>
                            </div>
                        </div>
                        <!-- Image3 -->
                        <div class="carousel-item">
                            <div class="img-fluid1" id="img-3">

                            </div>
                            <div class="overdiv"></div>
                            <!-- Carousel Caption -->
                            <div class="carousel-caption">
                                <h3>BLOODSHED <br> GET READY FOR WAR</h3>
                                <p class="text-center pbtn">
                                    @if(Session::has('username'))

                                    <a href="{{url('tournament')}}" class="btn btn_red text-uppercase">
                                        <span class="s2">Browse Tournament</span>
                                    </a>

                                    @else

                                    <a data-toggle="modal" data-target="#login_modal" class="btn btn_red text-uppercase">
                                        <span class="s2">Register Now!</span>
                                    </a>
                                    <a data-toggle="modal" data-target="#login_modal" class="btn btn_red text-uppercase">
                                        <span class="s2">Login</span>
                                    </a>

                                    @endif
                                </p>
                            </div>
                        </div>
                        <!-- Image4 -->
                        <div class="carousel-item">
                            <div class="img-fluid1" id="img-4">

                            </div>
                            <div class="overdiv"></div>
                            <!-- Carousel Caption -->
                            <div class="carousel-caption">
                                <h3>BLOODSHED <br> GET READY FOR WAR</h3>
                                <p class="text-center pbtn">
                                    @if(Session::has('username'))

                                    <a href="{{url('tournament')}}" class="btn btn_red text-uppercase">
                                        <span class="s2">Browse Tournament</span>
                                    </a>

                                    @else

                                    <a data-toggle="modal" data-target="#login_modal" class="btn btn_red text-uppercase">
                                        <span class="s2">Register Now!</span>
                                    </a>
                                    <a data-toggle="modal" data-target="#login_modal" class="btn btn_red text-uppercase">
                                        <span class="s2">Login</span>
                                    </a>

                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Carousel -->
            </div>
        </div>
        <!-- End of Row One -->
    </div>
</div>

<!-- Second Section -->
<div class="second-section">

    <div class="container-fluid">
        <div class="row p-0 m-0">
            <div class="col-md-12">
                <h1 class="text-center">HOW IT WORKS</h1><br>
            </div>
            <div class="col-lg-4">
                <img class="d-block mx-auto" src="{{asset(url('images/sec-2-img-1red.png'))}}"><br><br>
                <h4>SIGN UP TODAY</h4>
                <hr>
                <p>Sign up using your email ID to participate and compete in a variety of tournaments across PC, Mobile and Console platforms</p>
            </div>
            <div class="col-lg-4">
                <img class="d-block mx-auto" src="{{asset(url('images/sec-2-img-2red.png'))}}"><br><br>
                <h4>COMPLETE IN TOURNAMENTS</h4>
                <hr>
                <p>Compete for cash, trophies and bragging rights </p>
            </div>
            <div class="col-lg-4">
                <img class="d-block mx-auto" src="{{asset(url('images/sec-2-img-3red.png'))}}"><br><br>
                <h4>WIN & EARN CASH</h4>
                <hr>
                <p>Use your winning coins to participate in paid tournaments or exchange them to make some serious cash!
                </p>
            </div>
        </div>
    </div>

    <!-- Second Section Button -->
    <p class="text-center pbtn">
        @if(Session::has('username'))
        <a href="{{url('tournament')}}" class="btn btn_red text-uppercase">
            <span class="s2">Browse Tournament</span>
        </a>
        @else
        <a data-toggle="modal" data-target="#login_modal" class="btn btn_red text-uppercase">
            <span class="s2">Register Now!</span>
        </a>
        @endif
    </p>

</div>

<!--Tabs Section / third-section -->
<section class="container-fluid third-section">
    <div class="row p-0">
        <div class="col-md-12 p-0">
            <div class="tab-inner_heading">
                <h2 class="heading-secondary text-center pt-3 pb-3 display-4">
                    RECENTLY CREATED TOURNAMENT
                </h2>
            </div>
            <div class="container p-0">
                <div class="row">
                    @for($i = 0; $i < 3; $i++) @if(!empty($event_card_detail[$i])) <div class="col-md-4 col-sm-6 mx-auto">
                        <div class="card mx-auto">
                            <div class="face face1">
                                <div class="content">
                                    <img src="{{$event_card_detail[$i]->banner}}" alt="">
                                </div>
                            </div>
                            <div class="face face2">
                                <div class="content">
                                    <h3>{{$event_card_detail[$i]->tournament_name}}</h3>
                                    <p>{{$event_card_detail[$i]->price}}</p>
                                    <p>{{$event_card_detail[$i]->prize}}</p>
                                    <p>{{$event_card_detail[$i]->start_date}}</p>
                                    <a href="{{url('event_show',[$event_card_detail[$i]->event_id])}}" class="btn btn-danger mx-auto d-block">Tournament Page</a>
                                </div>
                            </div>
                        </div>
                </div>
                @else
                <div class="col-md-4 col-sm-6 mx-auto">
                    <div class="card mx-auto">
                        <div class="face face1">
                            <div class="content">
                                <div class="text-danger">Tournament Not Available !</div>
                            </div>
                        </div>
                        <div class="face face2">
                            <div class="content">
                                <h3>
                                    Available: As soon as possible !
                                </h3>
                                <p>If you like to create your own tournament. Please go ahead and register yourself as an organizer.</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endfor
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Fourth Section / Parallax -->
<section class="fourth-section">
    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-0">
            <div class="col-md-6 pl-5">
                <div class="left-content">
                    <h5>PARTICIPATE IN FREE TOURNAMENTS</h5>
                    <h2>Play and Win Cash Prizes!</h2>
                    <p>
                        Bloodshed is offering its users a wide variety of free tournaments to participate in. All you have to do is register, browse and find tournament for your favorite game!
                    </p>
                    <p>
                        The best part? Entry for official Bloodshed tournaments is free! Drop into the battlegrounds today and start dominating your opponents! Win cash prizes in games like PUBG Mobile and Fortnite by playing for free!
                    </p>
                </div>
                <a href="{{url('tournament')}}" class="btn text-white btn-lg" style="background: #fe0000;">Browse Tournament</a>
            </div>
            <div class="col-md-6">
                <div class="right-img">
                    <img src="{{asset(url('images/characters-ghost.jpg'))}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LeaderBoards -->
<section class="leader">
    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-0">
            <div class="col-md-12">
                <h2 class="display-4 pt-4 pb-4">LEADERBOARD TALENTS</h2>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="leader-card-1 mx-auto card">
                    <div class="card-header">
                        <div class='card-img d-inline-block'>
                            <img src="{{asset(url('images/leader-1.jpg'))}}" class="" alt="">
                        </div>
                        <div class="card card-text">
                            <span class="d-block">Raghav Sharma</span>
                            <span class="d-block">[FFyh987]</span>
                            <span class="d-block">23 yrs, Amritsar</span>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="card-img-propic position-absolute">
                            <img src="{{asset(url('images/major-badge-7.png'))}}" alt="">
                        </div>
                        <div class="card-title mt-5">
                            <hr id="leader-hr" class="leader-hr-1">
                            <div class="card-title">
                                <span>
                                    <h5>1200</h5>
                                </span>
                            </div>
                            <div class="card-subtitle">
                                <span>
                                    <h5>RATING POINT</h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="leader-rank">
                    RANK <span>#2</span>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="leader-card-2 mx-auto card">
                    <div class="card-header">
                        <div class='card-img d-inline-block'>
                            <img src="{{asset(url('images/leader-1.jpg'))}}" class="" alt="">
                        </div>
                        <div class="card card-text">
                            <span class="d-block">Neeraj Khorishi</span>
                            <span class="d-block">[COD098uJ]</span>
                            <span class="d-block">21 yrs, Amritsar</span>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="card-img-propic position-absolute">
                            <img src="{{asset(url('images/major-badge-7.png'))}}" alt="">
                        </div>
                        <div class="card-title mt-5">
                            <hr id="leader-hr" class="leader-hr-2">
                            <div class="card-title">
                                <span>
                                    <h5>1300</h5>
                                </span>
                            </div>
                            <div class="card-subtitle">
                                <span>
                                    <h5>RATING POINT</h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="leader-rank-1">
                    RANK <span>#1</span>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="leader-card-3 mx-auto card">
                    <div class="card-header">
                        <div class='card-img d-inline-block'>
                            <img src="{{asset(url('images/leader-1.jpg'))}}" class="" alt="">
                        </div>
                        <div class="card card-text">
                            <span class="d-block">Amandeep Singh</span>
                            <span class="d-block">[PUNGuu8uJ]</span>
                            <span class="d-block">19 yrs, Mohali</span>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="card-img-propic position-absolute">
                            <img src="{{asset(url('images/major-badge-7.png'))}}" alt="">
                        </div>
                        <div class="card-title mt-5">
                            <hr id="leader-hr" class="leader-hr-3">
                            <div class="card-title">
                                <span>
                                    <h5>1090</h5>
                                </span>
                            </div>
                            <div class="card-subtitle">
                                <span>
                                    <h5>RATING POINT</h5>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="leader-rank-3">
                    RANK <span>#3</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fifth Section -->
<section class="fifth-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="left-content-img">
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-content">
                    <h5>
                        <span class="d-block display-4">Jump into the world of Gaming War.</span>
                        <span class="d-block pt-3 pb-3">Fight and Stay Alive !</span>
                        <span class="d-block">Till the end.</span>
                    </h5>
                </div>
                @if(Session::has('username'))
                <a href="{{url('tournament')}}" class="btn">Let's go for Battle Royale</a>
                @else
                <a data-toggle="modal" data-target="#login_modal" class="btn">Sign up for Battle Royale</a>
                @endif
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