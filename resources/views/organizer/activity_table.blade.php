@extends('layout.org_navbar')

@section('navbar')
@parent
@endsection


@section('main_content')

<title>Tournament Result</title>
<link rel="stylesheet" href="{{asset(url('user_module/mymatches.css'))}}">
<style>
    .no_event {
        background: #192231;
        box-shadow: -5px -5px 11px rgba(113, 113, 113, 0.15),
            5px 5px 11px rgba(0, 0, 0, .15);
        border-radius: 20px;
        padding: 4rem 1px;
        position: relative;
    }

    .div-centered {
        width: 100%;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .rank {
        height: 100px;
        width: 100px;
        overflow: hidden;
    }

    .rank img {
        height: 100%;
        width: 100%;
    }
</style>

<!-- Sidebar / Code -->
<header>

    <div class="hamburger">
        <i class="nav_icon fas fa-bars"></i>
    </div>
    <nav class="sidebar">
        <!-- profile picture -->
        <div class="profile_picture">
            <img src="../images/profile.jpg" alt="">
        </div>

        <div class="profile_name">
            <p>{{Session::get('username')}}</p>
        </div>
        <nav class="sidebar">
            <!-- profile picture -->
            <div class="profile_picture">
                <img src="../images/profile.jpg" alt="">
            </div>

            <div class="profile_name">
                <p>{{Session::get('username')}}</p>
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

<!-- Body Section / Tabs -->
<main>
    <div class="zoom-content">
        <!-- All event  -->
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="event_first_heading-2 col-12">
                    <h1>Event</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row p-0 m-0">
                <div class="col-12 p-0 m-0 mx-auto">
                    <div class="match-detail mt-5">
                        <div class="matches-table">
                            <table class="table table-borderless table-striped table-hover table-scroll-vertical table">
                                <thead>
                                    <tr>
                                        <td>Rank</td>
                                        <td>Player Name</td>
                                        <td>Game</td>
                                        <td>Game Type</td>
                                        <td>Prize</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($completed_event_record as $print)
                                    <tr>

                                        @if($print->position == '1')
                                        <td class="rank"><img class="img-fluid" src='{{asset(url("images/1stPlace.jpg"))}}' alt=""></td>

                                        @elseif ($print->position == '2')
                                        <td class="rank"><img class="img-fluid" src='{{asset(url("images/2ndPlace.jpg"))}}' alt=""></td>
                                        @elseif ($print->position == '3')
                                        <td class="rank"><img class="img-fluid" src='{{asset(url("images/3rdPlace.jpg"))}}' alt=""></td>
                                        @else
                                        <td class="rank pl-4">{{$print->position}}<sup>th</sup></td>
                                        @endif
                                        <td>{{$print->user_username}}</td>
                                        <td>{{$print->game}}</td>
                                        <td>{{$print->type}}</td>
                                        <td>{{$print->prize}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Hamburger Menu Link -->
<script src="{{asset(url('JavaScript/Organizer_Dashboard.js'))}}"></script>
<!-- upper navbar link -->
<script src="{{asset(url('JavaScript/Organizer_menu.js'))}}"></script>
@endsection