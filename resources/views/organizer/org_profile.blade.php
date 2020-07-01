@extends('layout.org_navbar')

@section('navbar')
@parent
@endsection


@section('main_content')

<title>Organizer profile</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<link rel="stylesheet" href="{{asset(url('organizer/org_profile.css'))}}">

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
                        <img src='{{asset(url("profile_image/$org_detail->image"))}}' alt="">
                    </div>

                    <div class="profile_name">
                        {{$org_detail->username}}
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
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7 col-lg-7 col-sm-6 col-12 mt-5 mb-5 mx-auto">
                                    @if(session()->get('update_profile')))
                                    <div class="message alert alert-success p-2 rounded mt-1 mb-1 mx-auto w-100">
                                        {{session()->get('update_profile')}}
                                    </div>
                                    @endif
                                    <div class="main-card">
                                        <div class="profile-card" id="profile-card">
                                            <i class="fas fa-edit float-right edit" onclick=""></i><br>
                                            <div class="profile-pic">
                                            <img src='{{asset(url("profile_image/$org_detail->image"))}}' alt="">
                                            </div>
                                            <div class="profile-content">
                                                <h3 class="title">@if(!empty($org_detail->fullname)) {{$org_detail->fullname}} @else {{$org_detail->username}} @endif </h3>
                                                <span class="description">@if(!empty($org_detail->about)) {{$org_detail->about}} @else Edit your profile to tell about yourself. @endif </span>
                                                <hr>
                                                <div class="contact-info">
                                                    <div class="mailId"><i class="fas fa-envelope float-left"></i>@if(!empty($org_detail->email)) {{$org_detail->email}} @endif </div>
                                                    <div class="address"><i class="fas fa-home float-left"></i> @if(!empty($org_detail->address)) {{$org_detail->address}} @else Edit your profile to fill your address. @endif </div>
                                                    <div class="mobile"><i class="fas fa-phone-alt float-left"></i> @if(!empty($org_detail->mobile)) {{$org_detail->mobile}} @else Edit your profile to fill your mobile @endif </div>
                                                </div>
                                            </div>

                                            <ul class="social">
                                                <li><a href="" class="fab fa-instagram-square"></a></li>
                                                <li><a href="" class="fab fa-twitter-square"></a></li>
                                                <li><a href="" class="fab fa-facebook-square"></a></li>
                                            </ul>

                                        </div>
                                        <div class="edit-card mt-5 mb-5" id="edit-card">
                                            <i class="fas fa-angle-left float-right view" onclick="viewProfile()"></i><br>
                                            <h3>Edit Profile</h3>
                                            <form action="{{url('organizer_edit_profile_submit_data')}}" method="POST" class="input-group" enctype="multipart/form-data">
                                                @csrf()
                                                <label for="file" class="input-field input-label">
                                                    <span id="label_span" class="btn btn-dark float-left">Click Here Upload Profile Image</span></label>
                                                <input type="file" name="image" id="file" value="{{$org_detail->image}}" class="input-field">

                                                <input class="input-field" type="text" name="fullname" value="{{$org_detail->fullname}}" placeholder="Your Name" required>
                                                <textarea name="about" id="" class="input-field" placeholder="About">
                                                {{$org_detail->about}}
                                                </textarea>
                                                <input class="input-field" type="email" name="email" value="{{$org_detail->email}}" placeholder="Email Id" readonly>
                                                <input class="input-field" type="text" name="address" value="{{$org_detail->address}}" placeholder="Address">
                                                <input class="input-field" type="number" name="mobile" value="{{$org_detail->mobile}}" placeholder="Contact Number">
                                                <div class="div-btn mt-2">
                                                    <button type="submit" class="submit-btn rounded">Sumbit</button>
                                                </div>
                                            </form>
                                        </div>

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
    $(document).ready(function() {
        $('#edit-card').hide();
        $('.edit').click(function() {
            $('#edit-card').show();
            $('#profile-card').hide();
        });
        $('.view').click(function() {
            $('#profile-card').show();
            $('#edit-card').hide();
        });

        // upload image
       
        $('textarea').each(function() {
            $(this).val($(this).val().trim());
        });

    });
</script>
<!-- Hamburger Menu Link -->
<script src="{{asset(url('JavaScript/Organizer_Dashboard.js'))}}"></script>
<!-- upper navbar link -->
<script src="{{asset(url('JavaScript/Organizer_menu.js'))}}"></script>
@endsection