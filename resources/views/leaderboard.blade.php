@extends('layout.user_navbar_footer')

@section('navbar')
@parent
@endsection

@section('main_content')
<link rel="stylesheet" href="../static_css/leaderboard.css">

<!-- Leaderboard Section -->
<section class="leader">
    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-0 pt-5 pb-5" style="background-color: #131c29;">
            <div class="col-md-12">
                <h2 class="display-4 pt-4 pb-4">OGT LEADERBOARD TALENTS</h2>
            </div>
            <div class="col-sm-8 mx-auto col-md-6 col-lg-4">
                <div class="leader-card-1 mx-auto card">
                    <div class="card-header">
                        <div class='card-img d-inline-block'>
                            <img src="images/leader-1.jpg" class="" alt="">
                        </div>
                        <div class="card card-text">
                            <span class="d-block">Raghav Sharma</span>
                            <span class="d-block">[FFyh987]</span>
                            <span class="d-block">23 yrs, Amritsar</span>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="card-img-propic position-absolute">
                            <img src="images/major-badge-7.png" alt="">
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

            <div class="col-sm-8 mx-auto col-md-6 col-lg-4">
                <div class="leader-card-2 mx-auto card">
                    <div class="card-header">
                        <div class='card-img d-inline-block'>
                            <img src="images/leader-1.jpg" class="" alt="">
                        </div>
                        <div class="card card-text">
                            <span class="d-block">Neeraj Khorishi</span>
                            <span class="d-block">[COD098uJ]</span>
                            <span class="d-block">21 yrs, Amritsar</span>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="card-img-propic position-absolute">
                            <img src="images/major-badge-7.png" alt="">
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

            <div class="col-sm-8 mx-auto col-md-6 col-lg-4">
                <div class="leader-card-3 mx-auto card">
                    <div class="card-header">
                        <div class='card-img d-inline-block'>
                            <img src="images/leader-1.jpg" class="" alt="">
                        </div>
                        <div class="card card-text">
                            <span class="d-block">Amandeep Singh</span>
                            <span class="d-block">[PUNGuu8uJ]</span>
                            <span class="d-block">19 yrs, Mohali</span>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="card-img-propic position-absolute">
                            <img src="images/major-badge-7.png" alt="">
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
    <div class="container-fluid p-0 m-0">
        <div class="row m-0 p-0">
            <div class="col-md-12">
                <h2 class="display-4 pt-4 pb-4 mt-5">PLAN A MATCH TO KNOW YOUR CURRENT STATE</h2>
            </div>
            <div class="col-sm-8 col-md-6 mx-auto col-lg-4">
                <div class="leader-card-1 mx-auto card">
                    <div class="card-header">
                        <div class='card-img d-inline-block'>
                            <img src="images/leader-1.jpg" class="" alt="">
                        </div>
                        <div class="card card-text">
                            <span class="d-block">Your Name</span>
                            <span class="d-block">[Your ID]</span>
                            <span class="d-block">[Your Age]</span>
                        </div>
                    </div>
                    <div class="card-body position-relative">
                        <div class="card-img-propic position-absolute">
                            <img src="images/major-badge-7.png" alt="">
                        </div>
                        <div class="card-title mt-5">
                            <hr id="leader-hr" class="leader-hr-1">
                            <div class="card-title">
                                <span>
                                    <h5>[Your Point]</h5>
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
            </div>
        </div>
        <!-- table -->
        <div class="col-md-12 mx-auto mt-4 pt-5 pb-5 table-responsive" style="background-color: #131c29;">
            <table class="table
                                    table-sm
                                    table-bordered
                                    table-striped
                                    text-center
                                    table-hover">
                <thead class="thead-dark">
                    <tr class="th-head">
                        <th width="8%" class="text-center">Rank</th>
                        <th width="27%" class="text-center">Name</th>
                        <th width="19%" class="text-center">Matches</th>
                        <th width="15%" class="text-center">Win Rate</th>
                        <th width="10%" class="text-center">Rating</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td width="8%" class="text-center rank">4</td>
                        <td width="27%" class="text-center rk-img">
                            <figure>
                                <a href="https://www.ultimatebattle.in/members/anirudhaurange403/" target="_blank">
                                    <img src="https://www.ultimatebattle.in/wp-content/uploads/2019/12/Steam-Pic-60x60.jpg" alt="" class=""></a>
                            </figure><span><a href="https://www.ultimatebattle.in/members/anirudhaurange403/" target="_blank">Anirudh Aurange</a></span>
                        </td>
                        <td width="19%" class="text-center match">
                            <span class="num">36</span>
                            <span class="wl">W: <small>33 /</small> L: <small>3</small></span>
                        </td>
                        <td width="15%" class="text-center points">91.7%</td>
                        <td width="10%" class="text-center points">1559</td>
                    </tr>
                    <tr>
                        <td width="8%" class="text-center rank">5</td>
                        <td width="27%" class="text-center rk-img">
                            <figure>
                                <a href="https://www.ultimatebattle.in/members/anirudhaurange403/" target="_blank">
                                    <img src="https://www.ultimatebattle.in/wp-content/uploads/2019/12/Steam-Pic-60x60.jpg" alt="" class=""></a>
                            </figure><span><a href="https://www.ultimatebattle.in/members/anirudhaurange403/" target="_blank">Karan Bhagat</a></span>
                        </td>
                        <td width="19%" class="text-center match">
                            <span class="num">36</span>
                            <span class="wl">W: <small>33 /</small> L: <small>3</small></span>
                        </td>
                        <td width="15%" class="text-center points">87.7%</td>
                        <td width="10%" class="text-center points">1492</td>
                    </tr>
                </tbody>

            </table>
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