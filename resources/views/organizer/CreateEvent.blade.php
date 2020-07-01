@extends('layout.org_navbar')

@section('navbar')
@parent
@endsection


@section('main_content')
<!-- Main Navbar -->
<title>Create New Event</title>
<link rel="stylesheet" href="{{asset(url('organizer/Organizer_CreateNewEvent1.css'))}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

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
            <p><?php //echo strtoupper($username); 
                ?></p>
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

        @if(session()->has('created'))
        <div id="message" class="modal fade">
            <div class="modal-dialog modal-confirm  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="far fa-check"></i>
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body text-center">
                        <h4>Great!</h4>
                        <p>Your account has been created successfully.</p>
                        <button class="btn btn-success" data-dismiss="modal"><span>Start Exploring</span> <i class="material-icons">&#xE5C8;</i></button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#message').modal("show");
        </script>
        @endif


        <div class="container-fluid">
            <form action="{{url('create_event_form')}}" method="POST" id="create_tournament" novalidate>
                @csrf()
                <!-- Tabs(Basics, Info , Settings) -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12 px-0">
                        <div class="tabs bg-dark">
                            <ul class="nav nav-tabs  text-center" role="tablist">
                                <li class="nav-item">
                                    <a data-toggle="tab" href="#tab1" role="tab" class="active_tab" id="basic_tab">
                                        <h6>Basics</h6>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="" role="tab" class="inactive_tab" id="info_tab">
                                        <h6>Info</h6>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-toggle="tab" href="" role="tab" class="inactive_tab" id="setting_tab">
                                        <h6>Settings</h6>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End of Tab's link coding -->
                <!-- Tab's Content -->
                <div class="row mt-5">
                    <div class="col-12 px-0">
                        <div class="tab-content bg-dark text-white p-4">
                            <!-- Tab-First's Content i.e. BASICS  -->
                            <div id="tab1" class="tab-pane fade show active ml-3" role="tabpanel">
                                <!-- i.e. Required input fields like name, type and time/date of game event -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="required-fields">
                                            <h4>Required Fields</h4>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="div">
                                                        <select class="form-control floating-select" name="select" id="select" onkeyup="this.setAttribute('value', this.value);" onclick="this.setAttribute('value', this.value);" value="">
                                                            <option class="bg-dark text-white" value=""></option>
                                                            <option class="bg-dark text-white" value="pubg">Pubg</option>
                                                            <option class="bg-dark text-white" value="cod">Call of Duty</option>
                                                            <option class="bg-dark text-white" value="freefire">Free Fire</option>
                                                            <option class="bg-dark text-white" value="fortnite">Fortnite</option>
                                                        </select>
                                                        <i class="fas fa-gamepad"></i>
                                                        <label class="pl-2">Select an option</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="div floating-label">
                                                        <select class="form-control floating-select" id="platform" name="platform" onkeyup="this.setAttribute('value', this.value);" onclick="this.setAttribute('value', this.value);" value="">
                                                            <option class="bg-dark text-white" value=""></option>
                                                            <option class="bg-dark text-white" value="mobile">MOBILE</option>
                                                        </select>
                                                        <i class="fas fa-laptop"></i>
                                                        <label class="pl-2">Game Platform</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="div">
                                                        <select class="form-control floating-select" id="type" name="type" onkeyup="this.setAttribute('value', this.value);" onclick="this.setAttribute('value', this.value);" value="">
                                                            <option class="bg-dark text-white" value=""></option>
                                                            <option class="bg-dark text-white" value="solo">Solo</option>
                                                            <option class="bg-dark text-white" value="duo">Duo</option>
                                                            <option class="bg-dark text-white" value="squad">Squad</option>
                                                        </select>
                                                        <i class="fas fa-users"></i>
                                                        <label class="pl-2">Game Type</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="div">
                                                        <input class="form-control form-input" type="text" name="event_name" id="event_name" min="10" autocomplete="off" required>
                                                        <i class="fas fa-font"></i><label for="">&nbsp;&nbsp;Tournament/Event Name</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="div">
                                                        <input class="form-control form-input" id="price" type="text" name="price" required>
                                                        <i class="fas fa-money-check-alt"></i><label for="">&nbsp;&nbsp;Price</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="div">
                                                        <input class="form-control form-input" id="prize" type="text" name="prize" required>
                                                        <i class="fas fa-trophy"></i><label for="">&nbsp;&nbsp;Total Prize or Perks</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="div">
                                                        <input class="form-control form-input" id="date" name="date" type="text" onclick="(this.type='date')" placeholder=" " required>
                                                        <i class="fas fa-calendar-alt"></i><label for="">&nbsp;&nbsp;Start
                                                            Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="div">
                                                        <input class="form-control form-input" id="time" name="time" type="text" onclick="(this.type='time')" placeholder=" " required>
                                                        <i class="fas fa-calendar-alt text-white"></i><label for="">&nbsp;&nbsp;Start
                                                            Time</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <!-- optional fields like logo-img, about the game(description) or banner of game event -->
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-12 mt-4 mb-3">
                                                    <h4>Optional Fields</h4>
                                                    <hr>
                                                    <div class="logo-img">
                                                        <div class="row">
                                                            <div class="col-md-10 px-0 py-2">
                                                                <label for="" class="">SELECT LOGO FOR EVENT</label>
                                                            </div>

                                                            <div class="col-md-12 col-lg-10">
                                                                <!-- Pubg radio section -->
                                                                <div class="row radio_button_images" id="pubg_radio_image_logo">

                                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="pubg_logo" value="images/pubg_logo_1.jpg">
                                                                            <img src="../images/pubg_logo_1.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="pubg_logo" value="images/pubg_logo_2.jpg">
                                                                            <img src="../images/pubg_logo_2.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="pubg_logo" value="images/pubg_logo_3.jpg">
                                                                            <img src="../images/pubg_logo_3.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="pubg_logo" value="images/pubg_logo_4.jpg">
                                                                            <img src="../images/pubg_logo_4.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- cod radio section -->
                                                                <div class="row radio_button_images" id="cod_radio_image_logo">
                                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="cod_logo" value="images/cod_logo_1.jpg">
                                                                            <img src="../images/cod_logo_1.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="cod_logo" value="images/cod_logo_2.jpg">
                                                                            <img src="../images/cod_logo_2.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="cod_logo" value="images/cod_logo_3.jpg">
                                                                            <img src="../images/cod_logo_3.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="cod_logo" value="images/event2tab.png">
                                                                            <img src="../images/event2tab.png" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Fortnite radio section -->
                                                                <div class="row radio_button_images" id="fortnite_radio_image_logo">
                                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="fortnite_logo" value="images/fortnite_logo_1.jpg">
                                                                            <img src="../images/fortnite_logo_1.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="fortnite_logo" value="images/fortnite_logo_2.jpg">
                                                                            <img src="../images/fortnite_logo_2.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="fortnite_logo" value="images/fortnite_logo_3.jpg">
                                                                            <img src="../images/fortnite_logo_3.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="fortnite_logo" value="images/eventfortnite.jpg">
                                                                            <img src="../images/eventfortnite.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- fortnite radio section -->
                                                                <div class="row radio_button_images" id="ff_radio_image_logo">
                                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="ff_logo" value="images/freefire_logo_1.jpg">
                                                                            <img src="../images/freefire_logo_1.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="ff_logo" value="images/freefire_logo_2.jpg">
                                                                            <img src="../images/freefire_logo_2.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="ff_logo" value="images/freefire_logo_3.jpg">
                                                                            <img src="../images/freefire_logo_3.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="ff_logo" value="images/eventTab4freefire.jpeg">
                                                                            <img src="../images/eventTab4freefire.jpeg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Banner -->
                                                <div class="col-md-12 mb-5 pb-5">
                                                    <div class="logo-img2 pb-5">
                                                        <div class="row">
                                                            <div class="col-md-10 px-0 py-2">
                                                                <label for="">SELECT BANNER FOR EVENT</label>
                                                            </div>

                                                            <div class="col-md-12 col-lg-10">
                                                                <!-- Pubg of duty radio section -->
                                                                <div class="row radio_button_images" id="pubg_radio_image">
                                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="pubg_banner" value="images/pubg_banner_1.jpg">
                                                                            <img src="../images/pubg_banner_1.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="pubg_banner" value="images/pubg_banner_2.jpg">
                                                                            <img src="../images/pubg_banner_2.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="pubg_banner" value="images/pubg_banner_3.jpg">
                                                                            <img src="../images/pubg_banner_3.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="pubg_banner" value="images/abtusimg3.jpg">
                                                                            <img src="../images/abtusimg3.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- cod radio section -->
                                                                <div class="row radio_button_images" id="cod_radio_image">
                                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="cod_banner" value="images/cod.jpg">
                                                                            <img src="../images/cod.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="cod_banner" value="images/cod1.jpg">
                                                                            <img src="../images/cod1.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="cod_banner" value="images/cod2.jpg">
                                                                            <img src="../images/cod2.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="cod_banner" value="images/cod4.jpg">
                                                                            <img src="../images/cod4.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Fortnite radio section -->
                                                                <div class="row radio_button_images" id="fortnite_radio_image">
                                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="fortnite_banner" value="images/fortnite.jpg">
                                                                            <img src="../images/fortnite.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="fortnite_banner" value="images/abtusimg4.jpg">
                                                                            <img src="../images/abtusimg4.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="fortnite_banner" value="images/fn2.jpg">
                                                                            <img src="../images/fn2.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="fortnite_banner" value="images/fn1.jpg">
                                                                            <img src="../images/fn1.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Free Fire radio section -->
                                                                <div class="row radio_button_images" id="ff_radio_image">
                                                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="ff_banner" value="images/ff1.jpg">
                                                                            <img src="../images/ff1.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="ff_banner" value="images/ff2.jpg">
                                                                            <img src="../images/ff2.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="ff_banner" value="images/ff3.jpg">
                                                                            <img src="../images/ff3.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-4 col-lg-3 mx-auto">
                                                                        <div class="radio_button_image_box_1 mx-auto position-relative">
                                                                            <input type="radio" name="ff_banner" value="images/eventfreefire2.jpg">
                                                                            <img src="../images/eventfreefire2.jpg" alt="">
                                                                            <h3 class="text_inside_radio_image">SELECTED</h3>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="button" class="btn btn-secondary" id="tab1_button">Next</button>
                                    </div>
                                </div>
                            </div>
                            <!-- --------------------------------Eof Tab-first's content---------------------------------------------- -->
                            <!-- --------------------------Tab-second's Content i.e. INFO -------------------------------------------- -->
                            <div id="tab2" class="tab-pane fade ml-3" role="tabpanel">
                                <!-- In Tab 2 i.e. INFO tab , Organizers will give details that how players can contact to them like on fb, twitter etc -->
                                <h4 class="mt-3">How player know. In which game area they are gonna playing ?</h4>
                                <hr>
                                <div class="contact-input-field mt-1">
                                    <div class="row">
                                        <div class="col-md-10 mb-2 p-2">
                                            <h2 for="" class="game_name" id="game_name"></h2>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <div class="div">
                                                <select class="form-control floating-select" id="region" name="region" onclick="this.setAttribute('value', this.value);" value="">
                                                    <option class="bg-dark text-white" value=""></option>
                                                    <option class="bg-dark text-white" value="Asia">Asia
                                                    </option>
                                                    <option class="bg-dark text-white" value="krjp">KRJP</option>
                                                    <option class="bg-dark text-white" value="north america">North America</option>
                                                    <option class="bg-dark text-white" value="europe">Europe</option>
                                                </select>
                                                <i class="fas fa-globe"></i><label for="" class="pl-2">Game Region</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 mt-3">
                                            <div class="div" id="select_map">
                                                <select class="form-control floating-select map" id="pubg_map" name="pubg_map" onclick="this.setAttribute('value', this.value);" value="">
                                                    <option class="bg-dark text-white" value=""></option>
                                                    <option class="bg-dark text-white" value="erangle">Erangle
                                                    </option>
                                                    <option class="bg-dark text-white" value="miramar">Miramar</option>
                                                    <option class="bg-dark text-white" value="sanhok">Sanhok
                                                    </option>
                                                    <option class="bg-dark text-white" value="vikendi">Vikendi
                                                    </option>
                                                </select>

                                                <select class="form-control floating-select map" id="fortnite_map" name="fortnite_map" onclick="this.setAttribute('value', this.value);" value="">
                                                    <option class="bg-dark text-white" value=""></option>
                                                    <option class="bg-dark text-white" value="fortnite">Team Rumble</option>
                                                </select>

                                                <select class="form-control floating-select map" id="cod_map" name="cod_map" onclick="this.setAttribute('value', this.value);" value="">
                                                    <option class="bg-dark text-white" value=""></option>
                                                    <option class="bg-dark text-white" value="isolated">Isolated</option>
                                                </select>

                                                <select class="form-control floating-select map" id="ff_map" name="ff_map" onclick="this.setAttribute('value', this.value);" value="">
                                                    <option class="bg-dark text-white" value=""></option>
                                                    <option class="bg-dark text-white" value="bermunda">Bermunda</option>
                                                    <option class="bg-dark text-white" value="kalahari">Kalahari</option>
                                                </select>
                                                <i class="fas fa-map"></i><label for="" class="pl-2">Game Map</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <div class="div">
                                                <select class="form-control floating-select" id="format" name="format" onclick="this.setAttribute('value', this.value);" value="">
                                                    <option class="bg-dark text-white" value=""></option>
                                                    <option class="bg-dark text-white" value="tpp">Tpp
                                                    </option>
                                                    <option class="bg-dark text-white" value="fpp">Fpp</option>
                                                </select>
                                                <i class="fas fa-random"></i><label for="">Game Format</label>
                                            </div>
                                        </div>
                                        <h4 class="mt-3 py-2 w-100">How many player or team will max. participate ?</h4>
                                        <hr>
                                        <div class="col-md-5">
                                            <div class="contact-url">
                                                <input class="form-control" type="number" name="player_number" id="player_number" max="100" title="Max 100 Pax" required>
                                                <i class="fas fa-users"></i><label for="" id="type_name"></label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="contact-url position-relative">
                                                <input class="form-control" type="number" id="team_number" name="team_number" readonly>
                                                <label for="" id="team_number_label" class="pl-3 position-absolute btn btn-secondary rounded" style="top: 2px !important; right: 5px; left: unset !important;">Total Team</label>
                                            </div>
                                        </div>
                                        <h4 class="mt-4 py-2 w-100">How player will contact you ?</h4>
                                        <hr>
                                        <div class="col-md-5">
                                            <div class="div">
                                                <select class="form-control floating-select" id="contact_option" onclick="this.setAttribute('value', this.value);" value="">
                                                    <option class="bg-dark text-white" value=""></option>
                                                    <option class="bg-dark text-white" value="1">Facebook</option>
                                                    <option class="bg-dark text-white" value="2">Twitter</option>
                                                    <option class="bg-dark text-white" value="2">Email</option>
                                                </select>
                                                <i class="fas fa-address-card"></i>
                                                <label class="pl-2">Select an option</label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="contact-url">
                                                <input class="form-control" type="text" id="contact" name="contact" required>
                                                <i class="fas fa-address-card"></i><label for="">Enter Your Contact
                                                    Details</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" name="previous_btn_1" id="previous_btn_1" class="btn btn-secondary">Previous</button>
                                        <button type="button" class="btn btn-secondary" id="tab2_button">Next</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Eof Tab-Second's content(INFO) -->
                            <!--  Tab-third's content i.e. SETTINGS -->
                            <!-- tab 3 contains fields like game region, players limit etc -->
                            <div id="tab3" class="tab-pane fade" role="tabpanel">
                                <h4 class="ml-3">Required Fields</h4>
                                <hr>
                                <div class="settings-required-field">
                                    <div class="container-fluid">
                                        <div class="row mt-3 mb-5 pb-5">
                                            <div class="col-md-12 mt-4 mb-4 px-0">
                                                <!-- Organizers can add rules about game event in this box -->
                                                <div class="Rules">
                                                    <div class="accordion_container">
                                                        <div class="accordion_head bg-dark border">Rules<span class="plusminus float-right">+</span>
                                                        </div>
                                                        <div class="accordion_body bg-secondary border">
                                                            <textarea name="" id="text-editor2"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Show Prize According to Rank -->
                                            <div class="col-md-12 px-0 mt-4 mb-4 text-white">
                                                <div id="accordion" class="accordion_container">
                                                    <div class="card bg-transparent border-white border">
                                                        <div class="card-header">
                                                            <a href="#follow" data-toggle="collapse" class="card-link d-block text-white">
                                                                Prizes:- <label id="prize_value"></label> [Divide Prize as rank or position]
                                                                <input id="counter_prize" name="counter_prize" type="hidden"></input>
                                                                <span class="plusminus float-right">+</span>
                                                            </a>
                                                        </div>
                                                        <div id="follow" class="collapse" data-parent="#accordion">
                                                            <table class="table text-center text-white w-100">
                                                                <thead>
                                                                    <th>Standings</th>
                                                                    <th>Cash Prizes</th>
                                                                    <th>Action</th>
                                                                </thead>
                                                                <tbody id="prize_table">
                                                                    <tr class="prize_increment">
                                                                        <td>Ist Prize</td>
                                                                        <td>
                                                                            <input type="text" name='prize_input[]' class="form-control">
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" value="Add video" class="btn btn-info add_prize">Add Prize</button>
                                                                        </td>
                                                                    </tr>
                                                                    <div class="prize_clone" style="display: none;">
                                                                        <tr class="prize_input_group">
                                                                            <td>Ist Prize</td>
                                                                            <td>
                                                                                <input type="text" name='prize_input[]' class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn btn-danger prize_delete_btn" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                                                            </td>
                                                                        </tr>
                                                                    </div>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Set schedule for event -->
                                            <!-- Show Prize According to Rank -->
                                            <div class="col-md-12 px-0 mt-4 mb-4 text-white">
                                                <div id="accordion" class="accordion_container">
                                                    <div class="card bg-transparent border-white border">
                                                        <div class="card-header">
                                                            <a href="#time" data-toggle="collapse" class="card-link d-block text-white">
                                                                Schedule:- [Set Schedule for Event]
                                                                <input id="time_counter" name="time_counter" type="hidden"></input>
                                                                <span class="plusminus float-right">+</span>
                                                            </a>
                                                        </div>
                                                        <div id="time" class="collapse" data-parent="#accordion">
                                                            <table class="table text-center text-white w-100">
                                                                <thead>
                                                                    <th>Groups</th>
                                                                    <th>Tentative Starting Time</th>
                                                                    <th>Action</th>

                                                                </thead>
                                                                <tbody id="schedule_table">
                                                                    <tr>
                                                                        <td><label class='text-white' id='schedule_1'>Ist Batch</label></td>
                                                                        <td><input type='time' name='schedule_time_1' id='schedule_time_1' value=''></td>
                                                                        <span>Click on clock icon.</span>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- tournament held place -->
                                            <div class="col-12 px-0">
                                                <h4 class="ml-3 mx-0 px-0 py-3">Tournament will be held at where ?</h4>
                                            </div>
                                            <div class="col-md-10 mt-3">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="">Place:- </label><input type="text" id="place" name="place" class="form-control" placeholder="Enter Place">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">Place Address:- </label><input type="text" id="place_address" name="place_address" class="form-control" placeholder="Enter Place Address">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">City:- </label><input type="text" name="city" id="city" class="form-control" placeholder="Enter City">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">State:- </label><input type="text" name="state" id="state" class="form-control" placeholder="Enter State">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">Pincode:- </label><input type="text" name="pincode" id="pincode" class="form-control" placeholder="Enter Pincode">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="">Check-In Time:- </label><input type="time" name="check_in" id="check-in" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 text-center">
                                                <button type="button" class="btn btn-secondary" id="previous_btn_2">Previous</button>
                                                <button type="button" class="btn btn-secondary" id="submit_data">Create</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- Eof Tab-third's content(settings) -->
                        </div>
                    </div>
                    <!-- Eof Tab's content -->
                </div>
            </form>
        </div>
    </div>
</main>
<!-- Hamburger Menu Link -->
<script src="{{asset(url('JavaScript/Organizer_Dashboard.js'))}}"></script>
<!-- upper navbar link -->
<script src="{{asset(url('JavaScript/Organizer_menu.js'))}}"></script>
<script src="{{asset(url('JavaScript/create_event.js'))}}"></script>
@endsection