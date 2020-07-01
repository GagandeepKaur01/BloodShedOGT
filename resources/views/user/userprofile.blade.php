@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')

<link rel="stylesheet" href="{{asset(url('user/userprofile_css.css'))}}">
<!-- Navbar -->
<div class="container-fluid position-relative">
    <div class="row">
        <div class="col-md-12 rat">
            <h1 class="text-center text-white">@if(!empty($user_detail->fullname)) {{$user_detail->fullname}} @else {{$user_detail->username}} @endif</h1>
        </div>

        <!-- Profile Picture -->
        <div class="col-md-12  fat">
            <div class="center button" onmouseover="button()">
                <img alt="person image" src='{{url("profile_image/$user_detail->image")}}'>
            </div>

        </div>
    </div>
</div>

<!-- User Stats -->
<div class="container-fluid user_stats">
    <div class="row sat">

        <div class="col-12 pro_name text-center">
            <h1 style="color: honeydew; ">@if(!empty($user_detail->fullname)) {{$user_detail->fullname}} @else {{$user_detail->username}} @endif</h1>
        </div>


        <h1 class="col-12 user_stats-heading text-center ">
            Player Statics
        </h1>

        @php
        $total_prize = 0;
        foreach($event_records as $calculate){
        $total_prize += $calculate->prize;
        }
        @endphp

        <div class="col-sm-6 col-md-3">
            <a href="#!">
                <div class="earning">
                    <i class="fas fa-money-bill-alt earn "></i>
                    <h4 style="color: white; ">{{$total_prize}}</h4>
                    <h6 style="color: white; ">Total earnings</h6>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#!">
                <div class="game_played">
                    <i class="fas fa-user-tag " style="color: greenyellow; "></i>
                    @php

                    if(!empty($all_events) && $all_events[0] != ''){
                    $event_count = count($all_events);
                    } else {
                    $event_count = 0;
                    }
                    @endphp
                    <h4 style="color: white; ">{{$event_count}}</h4>
                    <h6 style="color: white; ">Total Participation</h6>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            @php
            $total_played = count($event_records);
            @endphp
            <a href="#!">
                <div class="match_played">
                    <img src="https://gamingmonk.com/images/icons/matches-played.svg " alt=" ">
                    <h4 style="color: white; ">{{$total_played}}</h4>
                    <h6 style="color: white; ">Matches Played</h6>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            @php
            $total_winning = 0;
            foreach($event_records as $winning){
            if($winning->position == 1 || $winning->position == 2 || $winning->position == 3){
            $total_winning++;
            }
            }
            @endphp
            <a href="#!">
                <div class="won">
                    <img src="https://gamingmonk.com/images/icons/matches-won.svg " alt=" ">
                    <h4 style="color: white; ">{{$total_winning}}</h4>
                    <h6 style="color: white; ">Matches Won</h6>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Recently Stats -->
<div class="container-fluid recent_play_section ">
    <div class="row ">

        <!-- Heading -->
        <h1 class="col-12 user_stats-heading text-center ">
            Recently Participate
        </h1>

        <!-- Recently Played -->
        <div class="col-11 mt-3 mx-auto ">
            <div class="recent_play bg-dark p-2 " style="min-height: 200px; ">
                <div class="recent_play_icon mb-3 ">
                    <img src="https://cdn.gamingmonk.com/games_played.png" alt=" " style="height: 20px; ">
                </div>
                <div class="recent_play_games container-fluid">
                    <div class="row">

                        @if(!empty($all_events) && $all_events[0] != '')
                        @foreach (array_reverse($all_events) as $print_event)

                        <div class="col-sm-4 col-md-3 col-lg-2">
                            <div class="col-4-inner">
                                <img src='{{url("$print_event->logo")}}' alt="">
                                <p class="text-white text-center pt-2 mb-0">{{$print_event->tournament_name}}</p>
                                <p class="text-white text-center pt-2 mb-1">Start: {{$print_event->start_date}}</p>
                                <a href="{{url('event_show',[$print_event->event_id])}}" class="btn btn-secondary d-block mx-auto mt-1">View Event</a>
                            </div>
                        </div>
                        @endforeach
                        @else

                        <div class="p-1 rounded bg-dark w-100 text-center">
                            <p>Didn't Participate Yet! Look at our Tournament.</p>
                            <a href="{{url('tournament')}}" class="btn btn-danger mx-auto">Tournament</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- My Tournament -->
<div class="container-fluid my_tournament ">
    <div class="row ">
        <!-- Heading -->
        <h1 class="col-12 user_stats-heading text-center ">
            My Tournament
        </h1>
        <!-- Tournament -->
        <div class="col-11 bg-dark mt-3 mx-auto ">
            <div class="tournament pt-4 pb-4 ">
                <div class="tournament_icon ">
                    <img src="https://gamingmonk.com/images/icons/my-tournaments.svg " alt=" ">
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="tournament_content mt-3 pt-4 pb-4 ">
                                @foreach ($completed_event_detail as $player_done)
                                <div class="col-sm-5 col-md-3 col-lg-3">
                                    <div class="card">
                                        <img src='{{asset(url("images/$player_done->banner"))}}' alt="Completed Banner" class="card-img-top">
                                        <hr class="bg-light ">
                                        <div class="card-title p-2 ">
                                            <h7 class="text-white ">
                                                {{$player_done->tournament_name}}
                                            </h7><br>
                                            <h7 class="text-white ">
                                                Finished Date:- {{$player_done->start_date}}
                                            </h7>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid game_id ">
    <div class="row ">
        <!-- Heading -->
        <h1 class="col-12 user_stats-heading text-center ">
            Game ID's
        </h1>
        <!-- Game_ID -->
        <div class="col-11 bg-dark mt-3 mx-auto ">
            <div class="game_id_logo ">
                <img src="https://gamingmonk.com/images/icons/game-ids.svg " alt=" ">
            </div>
            <hr class="bg-light ">

            <div class="game_id_content ">
                <div class="container ">
                    <div class="row ">
                        <table class="table-dark table ">
                            <tbody>
                                <tr>
                                    <td>
                                    <th>PUBG-ID</th>
                                    </td>
                                    <td>{{$user_detail->pubg_id}}</td>
                                </tr>

                                <tr>
                                    <td>
                                    <th>FORTNITE-ID</th>
                                    </td>
                                    <td>{{$user_detail->fortnite_id}}</td>
                                </tr>

                                <tr>
                                    <td>
                                    <th>COD-ID</th>
                                    </td>
                                    <td>{{$user_detail->cod_id}}</td>
                                </tr>

                                <tr>
                                    <td>
                                    <th>FREEFIRE_ID</th>
                                    </td>
                                    <td>{{$user_detail->ff_id}}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="container ">
            <div class="game_work_logo ">
                <img src="https://gamingmonk.com/images/gamer-at-work.png " alt=" ">
            </div>
        </div>
    </div>
</div>


<script>
    function button() {
        document.getElementsByClassName("button")[0].classList.toggle("spin");
    }
</script>
<script src="{{asset(url('JavaScript/login.js'))}}"></script>
<script src="{{asset(url('JavaScript/Home.js'))}}"></script>

@endsection

@section('footer')

@parent

@endsection