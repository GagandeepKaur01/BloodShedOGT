<!Doctype html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset(url('css/bootstrap.css'))}}">
    <script src="{{asset(url('Jquery/jquery-3.4.1.js'))}}"></script>
    <script src="{{asset(url('js/bootstrap.js'))}}"></script>
    <link rel="stylesheet" href="{{asset('Font/fontawesome-free-5.12.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset(url('admin_css/admin_sidebar.css'))}}">
    <link rel="stylesheet" href="{{asset(url('admin_css/styleadmin.css'))}}">
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">

            <div class="sidebar-header">
                <h3 class="mt-5">BLOODSHED</h3>
            </div>

            <!-- sidebar profile picture -->
            <div class="sidebar_profile d-block d-lg-none">
                <div class="img_container">
                    <img src='{{asset(url("profile_image/$my_info->image"))}}' alt="profile">
                </div>

                <h4 class="admin_welcome">
                    {{Session::get('username')}}
                </h4>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="{{url('admin_dashboard')}}">Dashboard</a>
                </li>
                <li>
                    <a href="{{url('event_privilige')}}">Event Privilige</a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" class="dropdown-toggle">Website Pages</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home Page</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" class="dropdown-toggle">User Module</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="{{url('admin_user_data')}}">User Data</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#org" data-toggle="collapse" class="dropdown-toggle">Organizer Module</a>
                    <ul class="collapse list-unstyled" id="org">
                        <li>
                            <a href="{{url('admin_organizer_data')}}">Organizer Data</a>
                        </li>
                        <li>
                            <a href="{{url('event_privilige')}}">Organizer events</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('logout')}}">Logout</a>
                </li>
            </ul>

        </nav>
        <!-- Page Content -->
        <div id="content">
            <!-- sidebar button -->
            <div class="top_navbar position-fixed" style="z-index: 1111;">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="nav navbar_button">
                        <li class="nav-item">
                            <a href="#!" type="button" id="sidebarCollapse" class="btn bg-dark text-white">
                                <i class="fas fa-align-left"></i>
                                <span></span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav ml-auto profile">
                        <li class="nav-item profile_icon">
                            <span class="profile_icon_img">
                                <a href="#!">
                                    <img src='{{asset(url("profile_image/$my_info->image"))}}' alt="">
                                </a>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p class="">{{$my_info->username}}</p>
                                <p>Online</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>


            <!-- dashboard heading -->
            <div class="page_heading">
                <h2>Dashboard</h2>
            </div>

            <!-- Admin Info -->
            <div class="admin_welcome text-white">
                <div class="h1 welcome">
                    <span class="h1">Welcome Back</span>
                    <span class="admin_name pl-5">{{$my_info->username}}</span>
                </div>
            </div>

            <!-- 4 block of main dashboard -->
            <div class="container-fluid progress_bar">
                <div class="row rounded">
                    <div class="col-12 pt-1 pb-1">
                        <p>Portfolio Performance</p>
                    </div>

                    <!-- Ist Block -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="user_block d-flex rounded">
                            <!-- Logo -->
                            <div class="user_logo bg-warning">
                                <i class="fas fa-user"></i>
                            </div>
                            <!-- Stats -->
                            @php
                            $total_user = 0;
                            $total_organizer = 0;
                            $total_user = 0;
                            foreach($detail as $user){
                            if($user->user_type == 'user'){
                            $total_user++;
                            } elseif($user->user_type == 'organizer'){
                            $total_organizer++;
                            }
                            }
                            @endphp
                            <div class="user_count text-right p-3">
                                <p>User</p>
                                <span>
                                    @if(!empty($total_user))
                                    {{$total_user}}
                                    @else
                                    0
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- 2nd block -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="user_block d-flex rounded">
                            <!-- Logo -->
                            <div class="user_logo bg-warning">
                                <i class="fas fa-user"></i>
                            </div>
                            <!-- Stats -->
                            <div class="user_count text-right p-3">
                                <p>Organizer</p>
                                <span>{{$total_organizer}}</span>
                            </div>
                        </div>
                    </div>

                    <!-- 3rd block -->
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="user_block d-flex rounded">
                            <!-- Logo -->
                            <div class="user_logo bg-warning">
                                <i class="fas fa-user"></i>
                            </div>
                            <!-- Stats -->
                            @php
                            $total_event = count($events);
                            @endphp
                            <div class="user_count text-right p-3">
                                <p>Events</p>
                                <span>{{$total_event}}</span>
                            </div>
                        </div>
                    </div>

                    <!-- 4th block -->
                    <!-- <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="user_block d-flex rounded">
                        Logo
                        <div class="user_logo">
                            <i class="fas fa-user"></i>
                        </div>
                        Stats
                        <div class="user_count text-right p-3">
                            <p>Daily Activity</p>
                            <span>79</span>
                        </div>
                    </div>
                </div> -->
                </div>

            </div>

            <!-- website summary -->
            <div class="container-fluid website_summary mt-5">
                <div class="table_heading">
                    <i class="fas fa-table"></i>
                </div>
                <table class="table text-white text-center ">
                    <caption style="caption-side: top; text-align: center;">Website summary</caption>
                    <thead>
                        <th>
                            Role
                        </th>
                        <th>
                            Total enrolments
                        </th>
                        <th>
                            Active
                        </th>
                        <th>
                            Unactive
                        </th>
                        <th>
                            Action
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Administrator</td>
                            <td>1</td>
                            <td>1</td>
                            <td>0</td>
                            <td>
                                <a href="#!" class="btn bg-danger ">View Full Records</a>
                            </td>
                        </tr>

                        <tr>
                            <td>Organizer</td>
                            <td>{{$total_organizer}}</td>
                            @php
                            $count_non_active_organizer = 0;
                            $count_active_organizer = 0;
                            foreach($all_organizer_data as $org_data){
                            $datetime1 = $org_data->login_stamp;
                            $date = new DateTime($datetime1);
                            $now = new DateTime();

                            $day_diff = $date->diff($now)->format("%d");
                            if($day_diff > 6){
                            $count_non_active_organizer++;
                            } else{
                            $count_active_organizer += 1;
                            }
                            }
                            @endphp
                            <td>{{$count_active_organizer}}</td>
                            <td>{{$count_non_active_organizer}}</td>
                            <td>
                                <a href="{{url('admin_organizer_data')}}" class="btn bg-danger ">View Full Records</a>
                            </td>
                        </tr>

                        <tr>
                            <td>User</td>
                            @php
                            $count_non_active_user = 0;
                            $count_active_user = 0;
                            foreach($all_user_data as $user_data){
                            $datetime1 = $user_data->login_stamp;
                            $date = new DateTime($datetime1);
                            $now = new DateTime();

                            $day_diff = $date->diff($now)->format("%d");
                            if($day_diff > 6){
                            $count_non_active_user++;
                            }else{
                            $count_active_user += 1;
                            }
                            }
                            @endphp
                            <td>{{$total_user}}</td>
                            <td>{{$count_active_user}}</td>
                            <td>{{$count_non_active_user}}</td>
                            <td>
                                <a href="{{url('admin_user_data')}}" target="_blank " class="btn bg-danger ">View Full
                                    Records</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <script src="{{asset(url('admin_js/sidebar.js'))}}"></script>
</body>

</html>