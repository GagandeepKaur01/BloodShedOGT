@extends('layout.org_navbar')

@section('navbar')
@parent
@endsection


@section('main_content')
<link rel="stylesheet" href="{{asset(url('organizer/checkeventcss.css'))}}">
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
            <p>{{$username}}</p>
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

<!-- Body Section / Tabs -->
<main>
    <div class="zoom-content">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="event_first_heading col-12">
                    <h1>Pending Event</h1>
                </div>
                <div class="col-6 col-sm-5 col-md-3">
                    <select name="" id="" class="form-control">
                        <option value="">Month</option>
                        <option value="">This Month</option>
                        <option value="">Next Month</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- cards -->
        <div class="container-fluid mt-5">
            <div class="row">
                @foreach($all_pending_event as $print_event)
                @if(empty($print_event))
                <div class="no_event rounded mx-auto" style="height: 60vh; width: 80%;">
                    <div class="div-centered">
                        <h1 class="mb-5">You Haven't Created Any Tournament Yet</h1>
                        <div class="text-center"><a href="Organizer_CreateNewEvent.php" class="btn btn-warning">Create Tournament</a></div>
                    </div>
                </div>
                @else
                <div class=" col-sm-6 col-md-4 col-lg-3">
                    <a href="{{url('organizer_event_info,[$print_event->event_id]')}}">
                        <div class="card">
                            <img src='{{asset(url("$print_event->banner"))}}' class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{$print_event->tournament_name}}
                                </h5>
                                <p class="card-subtitle">
                                    <p>Status: Pending</p>
                                    <p>Prize: {{$print_event->price}}</p>
                                    <p>Starts: {{$print_event->start_date}} @ {{$print_event->time}} PM IST</p>
                                </p>
                                <a href="{{url('organizer_event_info,[$print_event->event_id]')}}" class="btn btn-primary">View</a>
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>


        <!-- All event  -->
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="event_first_heading-2 col-12">
                    <h1>Event</h1>
                </div>
                <div class="col-3">
                    <select name="" id="" class="form-control">
                        <option value="">Month</option>
                        <option value="">This Month</option>
                        <option value="">Next Month</option>
                    </select>
                </div>
            </div>
        </div>


        <!-- cards -->
        <div class="container-fluid mt-5">
            <div class="row">
                @foreach($granted_event as $print_grant_event)
                @if(empty($print_grant_event))
                <div class="no_event rounded mx-auto" style="height: 60vh; width: 80%;">
                    <div class="div-centered">
                        <h1 class="mb-5">Your tournament is pending for permission.</h1>
                    </div>
                </div>
                @else
                <div class=" col-sm-6 col-md-4 col-lg-3">
                    <a href="{{url('organizer_event_info',[$print_grant_event->event_id])}}">
                        <div class="card">
                            <img src='{{asset(url("$print_grant_event->banner"))}}' class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{$print_grant_event->tournament_name}}
                                </h5>
                                <p class="card-subtitle">
                                    <p>Status: Pending</p>
                                    <p>Prize: {{$print_grant_event->price}}</p>
                                    <p>Starts: {{$print_grant_event->start_time}} @ {{$print_grant_event->time}} PM IST</p>
                                </p>
                                <a href="{{url('organizer_event_info',[$print_grant_event->event_id])}}" class="btn btn-primary">View</a>
                                @php
                                $datetime1 = strtok($print_grant_event->start_date, " ");
                                $date = new DateTime($datetime1);
                                $now = new DateTime();

                                $day_diff = $date->diff($now)->format("%d");
                                @endphp
                                @if($day_diff == '0' || $day_diff >= '1')
                                <a href="{{url('submit_tournament_result',[$print_grant_event->event_id])}}" class="btn btn-primary">Submit Result</a>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</main>

<!-- Hamburger Menu Link -->
<script src="{{asset(url('JavaScript/Organizer_Dashboard.js'))}}"></script>
<!-- upper navbar link -->
<script src="{{asset(url('JavaScript/Organizer_menu.js'))}}"></script>
@endsection