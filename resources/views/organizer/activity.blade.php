@extends('layout.org_navbar')

@section('navbar')
@parent
@endsection


@section('main_content')

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
        <!-- All event  -->
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="event_first_heading-2 col-12">
                    <h1>Tournament Which is Completed.</h1>
                </div>
            </div>
        </div>


        <!-- cards -->
        <div class="container-fluid mt-5">
            <div class="row">
                @if(count($events) == 0)
                <div class="col-12 p-5 text-white bg-danger rounded">
                    <h1>Tournament not Completed yet </h1>
                </div>

                @else
                @foreach($events as $event)
                <div class=" col-sm-6 col-md-4 col-lg-3">
                    <a href="Organizer_EventInfo.php?event_id={{$event->event_id}}">
                        <div class="card">
                            <img src='{{asset(url("$event->banner"))}}' class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{$event->tournament_name}}
                                </h5>
                                <p class="card-subtitle">
                                    <p>Status: Pending</p>
                                    <p>Prize: {{$event->price}}</p>
                                    <p>Starts: {{$event->start_date}} @ {{$event->time}} PM IST</p>
                                </p>
                                <a href="{{url('org_event_info',[$event->event_id])}}" class="btn btn-primary">View</a>
                                <a href="{{url('show_event_result',[$event->event_id])}}" class="btn btn-primary">Show Result</a>                            
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</main>

<!-- Hamburger Menu Link -->
<script src="{{asset(url('JavaScript/Organizer_Dashboard.js'))}}"></script>
<!-- upper navbar link -->
<script src="{{asset(url('JavaScript/Organizer_menu.js'))}}"></script>
@endsection