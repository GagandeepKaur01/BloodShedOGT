@extends('layout.org_navbar')

@section('navbar')
@parent
@endsection


@section('main_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset(url('organizer/result_submit.css'))}}">

<!-- Navbar -->
<!-- Body Content Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 px-0 bg-dark">
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
            <main>
                <div class="zoom-content">
                    <section>
                        <div class="container-fluid p-0">
                            <div class="row p-0 m-0">
                                <div class="col-10 mx-auto">
                                    <div class="testbox">
                                        <form action="{{url('submit_user_event_result')}}" id="form_data" method="post">
                                            @csrf()
                                            <div class="banner">
                                                <h1>Tournament Submission</h1>
                                            </div>
                                            <p>Runner Information</p>
                                            <div class="item">
                                                <label for="name">Organizer<span>*</span></label>
                                                <input id="org" type="text" name="org" value="{{Session::get('username')}}" readonly />
                                            </div>
                                            <div class="item">
                                                <label for="name">Event ID<span>*</span></label>
                                                <input id="event_id" type="text" name="event_id" value="{{$event_detail->event_id}}" readonly />
                                            </div>
                                            <div class="item">
                                                <label for="player_username">Player username<span>*</span></label>
                                                <input id="player_username" type="text" name="player_username" required />
                                            </div>
                                            <div class="item">
                                                <label for="position">Position<span>*</span></label>
                                                <input id="position" type="text" name="position" required />
                                            </div>
                                            <div class="item">
                                                <label for="prize">Prize<span>*</span></label>
                                                <input id="prize" type="text" name="prize" required />
                                            </div>
                                            <div class="item">
                                                <label for="game">Game<span>*</span></label>
                                                <input id="game" type="text" name="game" value="{{$event_detail->game}}" readonly />
                                            </div>
                                            <div class="item">
                                                <label for="type">Game Type<span>*</span></label>
                                                <input id="type" type="text" name="type" value="{{$event_detail->type}}" readonly />
                                            </div>
                                            <div class="btn-block">
                                                <small>Total Entry: {{$event_detail->total_player}} You enter {{$total_records}}</small>
                                                <br />
                                                <button type="submit" id="submission">Submit</button>
                                            </div>

                                            @if($total_records == $event_detail->total_player)
                                                <a href="{{url('submit_tournament',[$event_detail->event_id])}}" class="btn btn-danger d-block mx-auto w-25 mt-3">Submit Tournament As Completed</a>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
    </div>
</div>



<script>
    $(function() {
        $('body').find('input').attr('required', 'true');

        $('#').click(function() {
            let org = $('#org').val();
            let event_id = $('#event_id').val();
            let player_username = $('#player_username').val();
            let position = $('#position').val();
            let prize = $('#prize').val();
            let game = $('#game').val();
            let type = $('#type').val();
            if (type == ' ') {
                alert('Fill All Required Field');
            } else {
                $.ajax({
                    url: '{{url("submit_user_event_result")}}',
                    type: 'post',
                    data: {
                        org: org,
                        event_id: event_id,
                        username: player_username,
                        position: position,
                        prize: prize,
                        game: game,
                        type: type
                    },
                    success: function(data) {
                        console.log(data);
                        // if (data == 'submit') {
                        //     let event_id = $('#event_id').val('');
                        //     let player_username = $('#player_username').val('');
                        //     let position = $('#position').val('');
                        //     let prize = $('#prize').val('');
                        //     let game = $('#game').val('');
                        //     let type = $('#type').val('');
                        // } else {
                        //     alert('something went wrong !');
                        // }
                    }
                });
            }

        });

        $('#tournament_completed').click(function() {
            let event_id = $('#event_id').val();

            $.ajax({
                url: 'result_submit.php',
                type: 'post',
                data: {
                    completed: 'completed',
                    event_id: event_id
                },
                success: function(data) {
                    if (data == 'submit') {
                        alert('Tournament Submitted')
                    } else {
                        alert('something went wrong !');
                    }
                }
            });
        });
    });
</script>
<!-- Hamburger Menu Link -->
<script src="{{asset(url('JavaScript/Organizer_Dashboard.js'))}}"></script>
<!-- upper navbar link -->
<script src="{{asset(url('JavaScript/Organizer_menu.js'))}}"></script>
@endsection