@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')

<link rel="stylesheet" href="{{asset(url('static_css/tournament.css'))}}">
<!-- Page Content -->
<div class="container-fluid bg-dark">
    <!-- Row One---------------------- -->
    <div class="row">
        <!-- BgImage -->
        <div class="col-12 px-0">
            <div class="bgimgEvents text-center"></div>
            <div class="textEvent">
                <h1>Tournaments</h1>
            </div>
            <!-- ----Event Tabs---- -->
            <div class="trytabs">
                <ul class="nav nav-tabs">
                    <li>
                        <a data-toggle="tab" href="#tab1">
                            <img class="img-fluid img-thumbnail" src="../images/event1tab.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab2">
                            <img class="img-fluid img-thumbnail" src="../images/event2tab.png" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab3">
                            <img class="img-fluid img-thumbnail" src="../images/event3tab.jpg" alt="">
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab4">
                            <img class="img-fluid img-thumbnail" src="../images/eventTab4freefire.jpeg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End of Row One----------------- -->
    <!-- Row Two------------------------ -->
    <div class="row mt-3 text-white">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 px-0">
            <!-- tab-content -->
            <div class="tab-content">
                <!-- -------------Tab One-------------- -->
                <div id="tab1" class="tab-pane active p-5">
                    <div class="container-fluid event_cards">
                        @if(count($pubg) == '0')
                        <div class="no-event bg-dark rounded">
                            <h1>PUBG Tournament Are Not Available For Now !</h1>
                        </div>
                        @else
                        <div class="row mt-5 event_card_box">
                            @foreach($pubg as $show_pubg)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-0 card_main_div">

                                <a href="{{url('event_show',[$show_pubg->event_id])}}" id="event_card">
                                    <div class="main-div2 rounded" id="pubg-small-card">
                                        <div class="inner-div2">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                                                        <div class="img-box2 ml-2">
                                                            <h7 id="timer">

                                                            </h7>
                                                            <img src='{{url("$show_pubg->banner")}}' alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                                                        <div class="context2 mt-5">
                                                            <h4>{{$show_pubg->tournament_name}}</h4>
                                                            <h6>Prize: {{$show_pubg->prize}} / Entry Fee:- {{$show_pubg->price}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="startTime2">
                                            <h6>Starts: {{$show_pubg->start_date}} @ {{$show_pubg->time}} PM IST</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <!-- ------------Eof Tab One----------- -->
                <!-- ------------Tab Two--------------- -->
                <div id="tab2" class="tab-pane fade p-5">
                    <div class="container-fluid">
                        @if(count($cod) == '0')
                        <div class="no-event bg-dark rounded">
                            <h1>COD Tournament Are Not Available For Now !</h1>
                        </div>
                        @else
                        <div class="row mt-5 event_card_box">
                            @foreach($cod as $show_cod)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-0 card_main_div">

                                <a href="{{url('event_show',[$show_cod->event_id])}}" id="event_card">
                                    <div class="main-div2 rounded" id="pubg-small-card">
                                        <div class="inner-div2">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                                                        <div class="img-box2 ml-2">
                                                            <h7 id="timer">

                                                            </h7>
                                                            <img src='{{url("$show_cod->logo")}}' alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                                                        <div class="context2 mt-5">
                                                            <h4>{{$show_cod->tournament_name}}</h4>
                                                            <h6>Prize: {{$show_cod->prize}} / Entry Fee:- {{$show_cod->price}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="startTime2">
                                            <h6>Starts:{{$show_cod->start_date}} @ {{$show_cod->time}}PM IST</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <!-- -------------Eof Tab Two--------- -->
                <!-- ------------Tab Three--------------- -->
                <div id="tab3" class="tab-pane fade p-5">
                    <div class="container-fluid">
                        @if(count($fortnite) == '0')
                        <div class="no-event bg-dark rounded">
                            <h1>Fortnite Tournament Are Not Available For Now !</h1>
                        </div>
                        @else
                        <div class="row mt-5">
                            @foreach($fortnite as $show_fn)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-0">
                                <a href="{{url('event_show',[$show_fn->event_id])}}" id="event_card">
                                    <div class="main-div2 rounded" id="cod-small-card">
                                        <div class="inner-div2">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                                                        <div class="img-box2 ml-2">
                                                            <h4 id="timer"></h4>
                                                            <img src='{{url("$show_fn->logo")}}' alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                                                        <div class="context2 mt-5">
                                                            <h4>{{$show_fn->tournament_name}}</h4>
                                                            <h6>Prize: {{$show_fn->prize}} / Entry Fee:- {{$show_fn->price}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="startTime2">
                                            <h6>Starts:{{$show_fn->start_date}} @ {{$show_fn->time}} PM IST</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <!-- ------------Eof Tab Three--------------- -->
                <!-- ------------Tab four--------------- -->
                <div id="tab4" class="tab-pane fade p-5">
                    <div class="container-fluid">
                        @if(count($ff) == '0')
                        <div class="no-event bg-dark rounded">
                            <h1>Free Fire Tournament Are Not Available For Now !</h1>
                        </div>
                        @else
                        <div class="row mt-5">
                            @foreach($ff as $show_ff)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 px-0">
                                <a href="{{url('event_show',[$show_ff->event_id])}}" id="event_card">
                                    <div class="main-div2 rounded" id="cod-small-card">
                                        <div class="inner-div2">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                                                        <div class="img-box2 ml-2">
                                                            <h4 id="timer"></h4>
                                                            <img src='{{url("$show_ff->logo")}}' alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7 col-md-6 col-sm-6 col-12">
                                                        <div class="context2 mt-5">
                                                            <h4>{{$show_ff->tournament_name}}</h4>
                                                            <h6>Prize: {{$show_ff->prize}} / Entry Fee:- {{$show_ff->price}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="startTime2">
                                            <h6>Starts: {{$show_ff->start_date}} @ {{$show_ff->time}} PM IST</h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <!-- ------------Eof Tab Four--------------- -->
            </div>
        </div>
    </div>
    <!-- Eof R2------------------------- -->
</div>

<script>
    // var countdown = * 1000;
    // var now = * 1000;

    // var x = setInterval(function() {
    //     // var now= new date().getTime();
    //     now = now + 1000;
    //     var distance = countdown - now;
    //     var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    //     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    //     var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    //     document.getElementById('timer').innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

    // }, 1000);
</script>

<script src="{{asset(url('JavaScript/login.js'))}}"></script>
<script src="{{asset(url('JavaScript/Home.js'))}}"></script>

@endsection

@section('footer')

@parent

@endsection