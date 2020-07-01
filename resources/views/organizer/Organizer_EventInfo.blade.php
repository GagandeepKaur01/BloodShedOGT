@extends('layout.org_navbar')

@section('navbar')
@parent
@endsection


@section('main_content')
<title>My Event</title>

<link rel="stylesheet" href="{{asset(url('organizer/organizer_eventinfo.css'))}}">

</head>

<!-- Navbar -->
<!-- Body Content Start -->
<div class="container-fluid bg-dark">
    <div class="row">
        <div class="col-md-12 px-0">
            <header>
                <div class="dashb pt-4 pl-5 text-white text-uppercase text-accent-1 text-center">
                    <h1>Dashboard</h1>
                </div>
                <div class="hamburger">
                    <i class="nav_icon fas fa-bars"></i>
                </div>
                <nav class="sidebar">
                    <!-- profile picture -->
                    <div class="profile_picture">
                        <img src='{{asset(url("$org_detail->username"))}}' alt="">
                    </div>

                    <div class="profile_name">
                        {{Session::get('username')}}
                    </div>
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="{{url('organizer_dashboard')}}" class="nav-link current">
                                <i title="Dashboard" class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('create_event')}}" class="nav-link">
                                <i title="Create Event" class="fas fa-plus-square"></i>Create Event
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('check-event')}}" class="nav-link">
                                <i title="Check Event" class="fas fa-check-double"></i>Check Event
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{asset(url('activity'))}}" class="nav-link">
                                <i title="Activity" class="fab fa-readme"></i>Activity
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{asset(url('logout'))}}" class="nav-link">
                                <i title="Logout" class="fas fa-sign-out-alt"></i>Logout
                            </a>
                        </li>
                    </ul>
                    <div class="social-media">
                        <a href="" class="icon-link">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="" cladss="icon-link">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                        <a href="" class="icon-link">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="" class="icon-link">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </div>
                </nav>

            </header>
            <main>
                <div class="zoom-content">

                    <section>
                        <!-- 1st container -->
                        <div class="container-fluid p-0 m-0 ">
                            
                            <div class="main_heading">
                                <h1 class="heading text-white text-center p-2">
                                    EVENT DETAIL
                                </h1>
                            </div>
                        </div>

                        <!-- 2nd container -->
                        <!-- Logo and Banner -->
                        <div class="container-fluid  pt-3 pb-3 p-0 m-0 logo_banner">
                            <div class="row p-0 m-0">
                                <!-- Logo -->
                                <div class="logo col-md-6 position-relative">
                                    <h2>GAME LOGO</h2>
                                    <div class="logo_img">
                                        <img src='{{url("$event->logo")}}' class="rounded img-fluid" alt="Logo">
                                    </div>
                                </div>
                                <!-- Banner -->
                                <div class="banner col-md-6 position-relative">
                                    <h2>GAME BANNER</h2>
                                    <div class="banner_img">
                                        <img src='{{url("$event->banner")}}' class="rounded d-block w-100" alt="Banner">

                                    </div>

                                </div>
                            </div>
                        </div>


                        <!-- 3rd container  game info-->
                        <div class="container-fluid third-section p-0 m-0 mt-5">
                            <div class="game_info">
                                <h1 class="text-center text-white">
                                    BASIC INFO
                                </h1>
                            </div>
                            <div class="edit_page d-inline-block p-2" id="edit_button">
                                <img src="https://img.icons8.com/color/48/000000/settings.png" />
                            </div>
                            <article>
                                <div class="event_info">
                                    <div class="info1">
                                        <div class="head1">Game Name </div>
                                        <div class="body1">{{$event->game}} Mobile</div>
                                    </div>

                                    <div class="info2">
                                        <div class="head1">Tournament Name </div>
                                        <div class="body1">{{$event->tournament_name}}</div>
                                    </div>
                                    <div class="info3">
                                        <div class="head1">Platform </div>
                                        <div class="body1">{{$event->platform}}</div>
                                    </div>
                                    <div class="info4">
                                        <div class="head1">Entry Fee </div>
                                        <div class="body1">{{$event->price}}</div>
                                    </div>
                                    <div class="info5">
                                        <div class="head1">Game Type</div>
                                        <div class="body1">{{$event->type}}</div>
                                    </div>
                                    <div class="info6">
                                        <div class="head1">Date & Time</div>
                                        <div class="body1">{{$event->start_date}} -> {{$event->time}} PM <br>Check-in -> {{$event->check_in}} PM</div>
                                    </div>
                                    <div class="info7">
                                        <div class="head1">Place and Address</div>
                                        <div class="body1">{{$event->address}}</div>
                                    </div>
                                    <div class="info7">
                                        <div class="head1">Event Start Time</div>
                                        <div class="body1">{{$event->time}}</div>
                                    </div>
                                    <div class="info8 d-block">
                                        <div id="accordion" class="bg-dark">
                                            <div class="card bg-dark">
                                                <div class="card-header">
                                                    <a href="#prize" data-toggle="collapse" class="card-link d-block">
                                                        <h3>Prize</h3>
                                                    </a>
                                                </div>
                                                <div id="prize" class="collapse" data-parent="#accordion">
                                                    <table class="table text-center w-75 mx-auto table-striped">
                                                        <thead>
                                                            <th>Position</th>
                                                            <th>Prize</th>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                            $prize = explode(',', $event->prize_list);
                                                            $i = 0;
                                                            @endphp

                                                            @foreach($prize as $key)
                                                            <tr>
                                                                <td>Position {{$i}}</td>
                                                                <td>{{$key}}</td>
                                                            </tr>
                                                            @php $i++; @endphp
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </article>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</div>

<!-- Hamburger Menu Link -->
<script src="{{asset(url('JavaScript/Organizer_Dashboard.js'))}}"></script>
<!-- upper navbar link -->
<script src="{{asset(url('JavaScript/Organizer_menu.js'))}}"></script>
@endsection