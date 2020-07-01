@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')


<body class="bg-dark">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url('static_css/eventCss.css')}}">

    <div class="match_info text-white position-relative text-center">
        <div class="match_info_inner">
            <div class="match_header">
                <h1 class="display-4">{{$event_detail->tournament_name}}</h1>
                @php
                if(empty($event_detail->player_list)){
                $count_player = 0;
                }else{
                $total_player = explode(",",$event_detail->player_list);
                $count_player = count($total_player);
                }
                @endphp
                <div class="match_stats">
                    <h4 class="display-4" style="font-size: 30px;">
                        @if($event_detail->type == 'solo')
                        PLAYER JOINED : {{$count_player}} / 100
                        @elseif($event_detail == 'duo')
                        TEAM JOINED : {{$count_player}} / 50 || PLAYER HAVE ON EACH TEAM: 2
                        @else
                        TEAM JOINED : {{$count_player}} / 25 || PLAYER HAVE ON EACH TEAM: 4
                        @endif
                    </h4>
                </div>
            </div>
        </div>
    </div>


    <div class="event_main_page container-fluid">
        <div class="row bg-dark">
            <div class="col-md-6 mx-auto pro_pic_section">
                <!-- page main profile -->
                <div class="profile_img">
                    <img class="" src='{{url("$event_detail->logo")}}'>
                </div>
            </div>

            <!-- second row for heading -->
            <div class="col-md-6 p-4">

                <!-- game heading -->
                <!-- <h1 id="aa" style="margin-left: 350px; color: cornsilk;">PUBG Mobile Ultimate</h1> -->
                <div class="game_heading text-center">
                    <h1 id="aa" style="color: cornsilk;">{{$event_detail->game}} MOBILE {{$event_detail->type}}</h1>
                </div>

                <!-- registration status of the game -->

                <div class="register text-center">
                    <!-- margin 430 replace  with txt-center -->
                    <a href="" class="btn bg-danger position-relative">
                        <span class="pr-3" style="border-right: 2px solid white;">
                            <i class="fa-li fa fa-check-square"></i>
                        </span>
                        <span style="color: cornsilk;" class="pl-2">REGISTERATION OPEN</span>
                    </a>
                </div>

                <!-- Platform status -->

                <div class="row">
                    <div class="col-md-12 mt-2 text-center">
                        <span style="color: cornsilk;" class="h6">Platform:</span>
                        <i class="fas fa-mobile-alt" style="color: cornsilk;"></i>
                    </div>
                </div>

                <!-- Date time, prize and team space status -->

                <div class="row" id="aa">
                    <div class="col-12 col-md-4 col-xl-4 p-0 mx-auto text-center">
                        <i class="fas fa-calendar-alt"></i>
                        <h5 class="mt-3">{{$event_detail->start_date}} {{$event_detail->time}}</h5>
                    </div>
                    <div class="col-12 col-md-4 col-xl-4 p-0 mx-auto text-center">
                        <i class="fas fa-trophy"></i>
                        <h5 class="mt-3">{{$event_detail->prize}}</h5>
                    </div>
                    <div class="col-12 col-md-4 col-xl-4 p-0 mx-auto text-center">
                        <i class="fas fa-users" style="margin-top: 23px; margin-bottom: 23px;"></i>
                        <h5 class="mt-3">{{$count_player}} /100</h5>
                    </div>
                </div>


                <!-- Registeration status and rules button -->
                <div class="rule-row row">
                    <div class="col-12 col-md-12 col-lg-4 mt-3 mb-3">
                        @php
                        $username = Session::get('username');
                        if($event_detail->type == 'solo') {
                        $make_event_array = explode(",",$event_detail->player_list);
                        if(in_array($username, $make_event_array)){
                        echo "<script>
                            setTimeout(() => {
                                $('#enable_button').html('Participated');
                                $('#enable_button').attr('disabled', 'true');
                            }, 5000);
                        </script>";
                        }
                        }elseif($event_detail->type == 'duo') {
                        $make_event_array = explode(":",$event_detail->player_list);
                        $array_size = count($make_event_array);
                        if($array_size > 2) { 
                            $makee_string_again = implode(",",$make_event_array); 
                            $make_event_array = explode(",", $makee_string_again); 
                        } 
                        
                        if(in_array($username, $make_event_array)){
                        echo "<script>
                            setTimeout(() => {
                                $('#enable_button').html('Participated');
                                $('#enable_button').attr('disabled', 'true');
                            }, 5000);
                        </script>";
                        }
                        }elseif($event_detail->type == 'squad'){
                        $make_event_array = explode(":",$event_detail->player_list);
                        $make_again_string = implode(",",$make_event_array);
                        $remove_colon = explode(",", $make_again_string);
                        if(in_array($username, $remove_colon)){
                        echo "<script>
                            setTimeout(() => {
                                $('#enable_button').html('Participated');
                                $('#enable_button').attr('disabled', 'true');
                            }, 5000);
                        </script>";
                        }
                        }
                        @endphp

                        @if(Session::get('username'))
                        @if(empty($payment_detail) || $payment_detail == '')
                        <form action="{{url('add_payment')}}" method="get">
                            @csrf()

                            <input type="hidden" name='event_id' value='{{$event_detail->event_id}}'>
                            <input type="hidden" value='{{Session::get("login_email")}}' name='user_email'>
                            <input type="hidden" value='{{$event_detail->price}}' name='price'>
                            <input type="submit" id='' value="Pay: {{$event_detail->price}}" class="btn bg-danger w-100 mx-auto">
                        </form>
                        @else
                        @if($event_detail->type == 'duo' || $event_detail->type == 'squad')

                        <button type="button" style="color: cornsilk;" id="enable_button" name="" class="btn bg-danger w-100 mx-auto" data-toggle="modal" data-target="#{{$event_detail->type}}">
                            Participate
                        </button>
                        @else
                        <form action="{{url('solo_participation_submission')}}" method="POST">
                            @csrf()
                            <input type="hidden" class="form-control" name="event_id" value="{{$event_detail->event_id}}" required="">
                            <input type="hidden" class="form-control" name="username" value="{{Session::get('username')}}" required="">
                            <button type="submit" style="color: cornsilk;" id="enable_button" name="player_participation" class="btn bg-danger w-100 mx-auto">
                                Participate
                            </button>
                        </form>
                        @endif
                        @endif

                        @else

                        <a style="color: cornsilk;" data-toggle="modal" data-target="#login_modal" class="btn bg-danger w-100 mx-auto">Login To Join</a>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-lg-4  mt-3 mb-3">
                        <a href="#!" class="btn text-white w-100 mx-auto" style="background: #000000;">RULES</a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-3 mb-3 mx-auto">
                        <a href="#!" class="btn text-white w-100 mx-auto" style="background: #0a9b12;">Team Joined</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <!-- Schedule Breakup -->
    <div class="schedule-table">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mx-auto p-4 bg-dark">
                    <div class="icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <!-- <h3 style="color: cornsilk;" id="table-">SCHEDULE</h3> -->
                    <table class="table table-striped table-dark text-center">
                        <caption>
                            Schedule
                        </caption>
                        <thead>
                            <tr>
                                <th>Group</th>
                                <th>Tentative Start Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Batch Ist</td>
                                <td>{{$event_detail->time}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Prize pool table  -->
    <div class="prize-pool-table container-fluid mb-5">
        <div class="row">
            <div class="col-md-12 mx-auto p-4 mt-5 bg-dark">
                <div class="icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <!-- <h3 style="color: cornsilk;">PRIZE POOL BEAKUP</h3> -->
                <table class="table table-striped table-dark text-center">
                    <caption>
                        Prize Pool Breakup
                    </caption>
                    <thead>
                        <tr>
                            <th>Standings</th>
                            <th>Cash Prize</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $prize_list = explode(",",$event_detail->prize_list);
                        @endphp
                        @foreach ($prize_list as $print_prize)
                        <tr>
                            <td>Batch</td>
                            <td>{{$print_prize}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Duo Participation Modal -->
    <!-- Button trigger modal -->
    <!-- Modal for Duo -->
    <div class="modal fade" id="duo" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Fill up your team or member detail for duo.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('submission_duo_team')}}" method="post" id="player_teamName">
                        @csrf()
                        <label for="player_1">Player username</label>
                        <input type="text" class="form-control" id="player_1" name="player_1" required="" placeholder="Enter Player Username">
                        <input type="hidden" class="form-control" name="event_id" value="{{$event_detail->event_id}}" required="">
                        <label id="error_msg"></label>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="duo_save" class="btn btn-primary">Submit Participation</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="squad" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Fill up your team or member detail for duo.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('submission_squad_team')}}" method="post" id="player_teamName_squad">
                        @csrf()
                        <label for="player_2">Player username</label>
                        <input type="hidden" class="form-control" name="event_id" value="{{$event_detail->event_id}}" required="">

                        <input type="text" class="form-control" id="player_2" name="player_2" required="" data-original-title="Please Enter Name" placeholder="Enter Player Username">
                        <div for="" id="error_msg"></div>
                        <label for="player_3" class="player_3">Player username</label>
                        <input type="text" class="form-control player_3" id="player_3" name="player_3" required="" placeholder="Enter Player Username">
                        <div for="" id="error_msg"></div>
                        <label for="player_4" class="player_4">Player username</label>
                        <input type="text" class="form-control player_4" id="player_4" name="player_4" required="" placeholder="Enter Player Username">
                        <div for="" id="error_msg"></div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="squad_save" class="btn btn-primary">Submit Participation</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="event_id" value="{{$event_detail->event_id}}">
    <input type="hidden" id="current_event_time" value="{{$event_detail->start_date}}">

    <!-- Footer -->


    <script>
        $(function() {
            let player_2 = false;
            let player_3 = false;
            let player_4 = false;

            duo_player = false;
            $('#player_1').keyup(function() {
                let textbox = $('#player_1').val();
                let event_id = $('#event_id').val();
                let current_event_time = $('#current_event_time').val();
                console.log('work fine');
                $.ajax({
                    url: '{{url("single_user")}}',
                    type: 'get',
                    data: {
                        'check_username': textbox,
                        'event_id': event_id,
                    },
                    success: (data) => {
                        console.log(data);
                        if (data == 'empty') {
                            duo_player = true;
                            $('#player_1').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Added successfully');
                        } else if (data == 'not_participated') {
                            duo_player = true;
                            $('#player_1').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Added successfully');
                        } else if (data == 'user_not_registered') {
                            $('#player_1').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('User not register with us. Sign up please.');
                        } else if (data == 'exist') {
                            $('#player_1').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('User already participate in this tournament');
                        }
                    }
                });
            });

            $('#duo_save').on('click', function() {

                if (duo_player == true) {
                    $('#player_teamName').submit();
                }
            });


            $('#player_2').keyup(function() {
                let textbox = $('#player_2').val();
                let event_id = $('#event_id').val();
                let current_event_time = $('#current_event_time').val();

                $.ajax({
                    url: '{{url("single_user")}}',
                    type: 'get',
                    data: {
                        'check_username': textbox,
                        'event_id': event_id
                    },
                    success: (data) => {
                        console.log(data);
                        if (data == 'empty') {
                            player_2 = true;
                            $('#player_2').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Added successfully');
                        } else if (data == 'not_participated') {
                            player_2 = true;
                            $('#player_2').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Added successfully');
                        } else if (data == 'user_not_registered') {
                            $('#player_2').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('User not register with us. Sign up please.');
                        } else if (data == 'exist') {
                            $('#player_2').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('User already participate in this tournament');
                        }
                    }
                });
            });
            $('#player_3').keyup(function() {
                let textbox = $('#player_3').val();
                let event_id = $('#event_id').val();
                let current_event_time = $('#current_event_time').val();

                $.ajax({
                    url: '{{url("single_user")}}',
                    type: 'get',
                    data: {
                        check_username: textbox,
                        event_id: event_id
                    },
                    success: (data) => {
                        console.log(data);
                        if (data == 'empty') {
                            player_3 = true;
                            $('#player_3').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Added successfully');
                        } else if (data == 'not_participated') {
                            player_3 = true;
                            $('#player_3').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Added successfully');
                        } else if (data == 'user_not_registered') {
                            $('#player_3').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('User not register with us. Sign up please.');
                        } else if (data == 'exist') {
                            $('#player_3').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('User already participate in this tournament');
                        }
                    }
                });
            });
            $('#player_4').keyup(function() {
                let textbox = $('#player_4').val();
                let event_id = $('#event_id').val();
                let current_event_time = $('#current_event_time').val();

                $.ajax({
                    url: '{{url("single_user")}}',
                    type: 'get',
                    data: {
                        check_username: textbox,
                        event_id: event_id
                    },
                    success: (data) => {
                        console.log(data);
                        if (data == 'empty') {
                            player_4 = true;
                            $('#player_4').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Added successfully');
                        } else if (data == 'not_participated') {
                            player_4 = true;
                            $('#player_4').addClass('is-valid').removeClass('is-invalid');
                            $('#error_msg').html('Added successfully');
                        } else if (data == 'user_not_registered') {
                            $('#player_4').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('User not register with us. Sign up please.');
                        } else if (data == 'exist') {
                            $('#player_4').addClass('is-invalid').removeClass('is-valid');
                            $('#error_msg').html('User already participate in this tournament');
                        }
                    }
                });
            });

            $('#squad_save').on('click', function() {
                console.log('submission-hit');
                console.log(player_2 + ' ' + player_3 + ' ' + player_4);
                if (player_2 == true && player_3 == true && player_4 == true) {
                    console.log('inner-submission-hit');
                    $('#player_teamName_squad').submit();
                }
            });
        });
    </script>

    <script src="{{asset(url('JavaScript/login.js'))}}"></script>

    @endsection

    @section('footer')

    @parent
    @endsection