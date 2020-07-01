@extends('layout.org_navbar')

@section('navbar')
@parent
@endsection


@section('main_content')
<link rel="stylesheet" href="{{asset(url('organizer/Organizer_Dashboard1.css'))}}">
<!-- Main Navbar -->

<!-- Navbar -->

<!-- Body Content Start -->
<div class="container-fluid">
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
                        <!-- Loader Divide into three block -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="containerC rounded">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-4 mx-auto">
                                                    <div class="card border border-0">
                                                        <div class="box">
                                                            <div class="percent">
                                                                <svg>
                                                                    <circle cx="70" cy="70" r="70"></circle>
                                                                    <circle cx="70" cy="70" r="70"></circle>
                                                                </svg>
                                                                <div class="number">
                                                                    <h1>
                                                                        @if(!empty($total_event))
                                                                        {{$total_event}}
                                                                        @else
                                                                        0
                                                                        @endif
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                            <h3 class="text">Total Events</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mx-auto px-0">
                                                    <div class="card border border-0">
                                                        <div class="box">
                                                            <div class="percent">
                                                                <svg>
                                                                    <circle cx="70" cy="70" r="70"></circle>
                                                                    <circle cx="70" cy="70" r="70"></circle>
                                                                </svg>
                                                                <div class="number">
                                                                    <h1>
                                                                        @if(!empty($total_participant))
                                                                        {{$total_participant}}
                                                                        @else
                                                                        0
                                                                        @endif
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                            <h3 class="text">Participiants</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mx-auto px-0">
                                                    <div class="card border border-0">
                                                        <div class="box">
                                                            <div class="percent mx-auto">
                                                                <svg>
                                                                    <circle cx="70" cy="70" r="70"></circle>
                                                                    <circle cx="70" cy="70" r="70"></circle>
                                                                </svg>
                                                                <div class="number">
                                                                    <h1>
                                                                        @if(!empty($complete_event))
                                                                        {{$complete_event}}
                                                                        @else
                                                                        0
                                                                        @endif
                                                                    </h1>
                                                                </div>
                                                            </div>
                                                            <h3 class="text">Events Completed</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status of Events -->
                        <div class="container-fluid mt-5">
                            <div class="row">
                                <div class="col-12 recently_table">
                                    <h1 class="text-center">Recently Created Events</h1>
                                    <table class="table mt-5">
                                        <thead>
                                            <th>Event Name</th>
                                            <th>Publish Date</th>
                                            <th>Start Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            @if(!empty($latest))
                                            @foreach($latest as $print)
                                            <tr>
                                                <td>{{$print->tournament_name}}</td>
                                                <td>{{$print->created_at}}</td>
                                                <td>{{$print->start_date}}</td>
                                                <td id='blink'>{{$print->status}}<span class='dot_ani'>...</span></td>
                                                <td> <a href="{{url('organizer_event_info',[$print->event_id])}}" class="btn btn-primary">View</a></td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <div class="alert-danger danger text-center pt-2 pb-2 rounded" style="min-height: 20vh;">
                                                <h1 class="text-dark">You Haven't Create Any Tournament Yet !</h1>
                                                <a href="{{url('tournament')}}" class="btn m-0 btn-dark mx-auto">Create New Tournament</a>
                                            </div>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Chart / Graph -->
                        <!-- <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <h1 class="p-4">Total Profit [Week Wise]</h1>
                                        <div class="TotalProfit-Chart mt-5 p-3 text-center text-white">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
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