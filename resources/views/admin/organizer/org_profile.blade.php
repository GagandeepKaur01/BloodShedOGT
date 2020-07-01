<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset(url('css/bootstrap.css'))}}">
    <script src="{{asset(url('Jquery/jquery-3.4.1.js'))}}"></script>
    <script src="{{asset(url('js/bootstrap.js'))}}"></script>
    <link rel="stylesheet" href="{{asset('Font/fontawesome-free-5.12.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset(url('admin_css/admin_sidebar.css'))}}">
    <link rel="stylesheet" href="{{asset(url('admin_css/org_profile.css'))}}">
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
            <div class="page_heading text-white">
                <h2>Organizer Module</h2>
            </div>

            <!-- Body Content -->
            <div class="container-fluid user_table_content">
                <div class="row">
                    <div class="col-12 p-0 pt-3 pb-3">
                        <h4 class="text-white text-center text-uppercase" style="letter-spacing: 3px;">
                            Organizer Profile Picture
                        </h4>

                        <div class="user_profile">
                            <img src='{{asset(url("profile_image/$my_info->image"))}}' alt="">
                        </div>
                    </div>
                    <!-- divide table in block -->
                   

                    @php
                    $datetime1 = strtok($user_info->updated_at, " ");
                    $date = new DateTime($datetime1);
                    $now = new DateTime();

                    $day_diff = $date->diff($now)->format("%d");
                    @endphp

                    <div class="col-sm-6 mt-5 last_game">
                        <div class="table_heading">
                            <i class="fas fa-user"></i>
                        </div>
                        <table class="table text-white text-center">
                            <caption style="caption-side: top; border-top: 1px solid #223a41; border-bottom: 1px solid #223a41; font-size: 22px; font-family: sans-serif;" class="text-white pl-3 text-center">
                                Last Login
                            </caption>
                            <thead>
                                <tr>
                                    <th>Login Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                       {{$user_info->login_stamp}}
                                    </td>

                                    @if($day_diff <= 2)
                                    <td><button class="btn btn-success">Active</button></td>
                                    @else
                                    <td><button class="btn btn-danger">inactive</button></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- personal information -->
                    <div class="col-12 p-0"></div>
                    <div class="User_data">
                        <div class="table_heading">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        <table class="table text-white text-center">
                            <caption style="caption-side: top; border-top: 1px solid #223a41; border-bottom: 1px solid #223a41; font-size: 22px; font-family: sans-serif;" class="text-white pl-3 text-center">Personal Information</caption>
                            <thead>
                                <tr>
                                    <th>Index</th>
                                    <th>Username</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{$user_info->username}}</td>
                                    <td>{{$user_info->fullname}}</td>
                                    <td>{{$user_info->email}}</td>
                                    <td>{{$user_info->mobile}}</td>
                                    <td>{{$user_info->gender}}</td>
                                    <td>{{$user_info->address}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- event information -->
                    <div class="User_data">
                        <div class="table_heading">
                            <i class="fas fa-table"></i>
                        </div>
                        <table class="table text-white text-center">
                            <caption style="caption-side: top; border-top: 1px solid #223a41; border-bottom: 1px solid #223a41; font-size: 22px; font-family: sans-serif;" class="text-white pl-3 text-center">Event Information</caption>
                            <thead>
                                <tr>
                                    <th>Index</th>
                                    <th>Event Held</th>
                                    <th>Completed</th>
                                    <th>In-Process</th>
                                    <th>Pending</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @php
                                    $total_event = count($pending) + count($granted) + count($completed);
                                    @endphp
                                    <td>1</td>
                                    <td>{{$total_event}}</td>
                                    <td>{{count($completed)}}</td>
                                    <td>{{count($granted)}}</td>
                                    <td>{{count($pending)}}</td>
                           
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Javascript -->
    <script src="{{asset(url('admin_js/sidebar.js'))}}"></script>
    <!-- <script>
        $(function() {
            $("#speed").selectmenu();
        }); -->
    </script>
</body>

</html>