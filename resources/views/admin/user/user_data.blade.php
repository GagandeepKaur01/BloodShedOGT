<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset(url('css/bootstrap.css'))}}">
    <script src="{{asset(url('Jquery/jquery-3.4.1.js'))}}"></script>
    <script src="{{asset(url('js/bootstrap.js'))}}"></script>
    <link rel="stylesheet" href="{{asset('Font/fontawesome-free-5.12.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{url('admin_css/User_data.css')}}">
    <link rel="stylesheet" href="../admin_css/admin_sidebar.css">
    <link rel="stylesheet" href="{{url('admin_css/admin_sidebar.css')}}">
    </style>
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
                <h2>User Module</h2>
            </div>

            <!-- Input Fields -->
            <div class="container mx-auto input_field">
                <div class="row p-0 m-0">
                    <div class="col-10 col-sm-12 col-md-4 mx-auto">
                        <div class="search-box position-relative">
                            <input type="text" class="box form-control mx-auto" placeholder="search here">
                            <i class="fas fa-search"></i>
                        </div>
                    </div>

                    <div class="select col-10 mx-auto col-md-4">
                        <select class="form-control mx-auto">
                            <option value="">Select status</option>
                            <option value="Active">Active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div>



                </div>
            </div>
            <!-- Body Content -->
            @php
            foreach($user_info as $user_data) {
            $datetime1 = strtok($user_data->created_at, " ");
            $date = new DateTime($datetime1);
            $now = new DateTime();

            $new_user = array();

            $day_diff = $date->diff($now)->format("%d");
            if($day_diff <= 2) { array_push($new_user, $user_data); } } @endphp <!-- Newly Register -->
                <div class="container-fluid user_table_content">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="User_data">
                                <div class="table_upper_heading">
                                    <h1 class="text-white text-center">Newly Register User</h1>
                                </div>
                                <div class="table_heading">
                                    <i class="fas fa-table"></i>
                                </div>
                                <table class="table text-white">
                                    <caption class="text-white pl-3">User's Info</caption>
                                    <thead>
                                        <tr>

                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            <th>View profile</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($new_user))
                                        @foreach($new_user as $active_user)
                                        <tr>
                                            <td>{{$active_user->fullname}}</td>
                                            <td>{{$active_user->email}}</td>
                                            <td>{{ucfirst($active_user->user_type)}}</td>
                                            <td>
                                                <p class="btn btn-success">Active</p>
                                            </td>
                                            <td><button class="btn btn-warning"><a href="{{url('user_profile',[$active_user->id])}}">View profile</a></button></td>
                                            <td><button class="btn btn-danger"><a href="{{url('user_delete',[$active_user->id])}}">Delete</a></button></td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6">No Record Available</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                foreach ($user_info as $user_data) {
                $datetime1 = strtok($user_data['created_at'], " ");
                $date = new DateTime($datetime1);
                $now = new DateTime();

                $active_old_user = array();
                $non_active_old_user = array();

                $day_diff = $date->diff($now)->format("%d");
                if ($day_diff <= 2) { } elseif ($day_diff> 2 && $day_diff < 7) { array_push($active_old_user, $user_data); } else { array_push($non_active_old_user, $user_data); } } @endphp <!-- Already Register -->
                        <div class="container-fluid user_table_content">
                            <div class="row">
                                <div class="col-12 p-0">
                                    <div class="User_data">
                                        <div class="table_upper_heading">
                                            <h1 class="text-white text-center">Already User</h1>
                                        </div>
                                        <div class="table_heading">
                                            <i class="fas fa-table"></i>
                                        </div>
                                        <table class="table text-white">
                                            <caption class="text-white pl-3">User's Info</caption>
                                            <thead>
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>View profile</th>
                                                    <th>Delete</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(!empty($user_info))
                                                @if(!empty($active_old_user))
                                                @foreach($active_old_user as $active_user)
                                                <tr>
                                                    <td>{{$active_user->fullname}}</td>
                                                    <td>{{$active_user->email}}</td>
                                                    <td>{{ucfirst($active_user->user_type)}}</td>
                                                    <td>
                                                        <p class="btn btn-success">Active</p>
                                                    </td>
                                                    <td><button class="btn btn-warning"><a href="{{url('user_profile',[$active_user->id])}}">View profile</a></button></td>
                                                    <td><button class="btn btn-danger"><a href="{{url('user_delete',[$active_user->id])}}">Delete</a></button></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                @if(!empty($non_active_old_user))
                                                @foreach($non_active_old_user as $non_active_user)
                                                <tr>
                                                    <td>{{$non_active_user->fullname}}</td>
                                                    <td>{{$non_active_user->email}}</td>
                                                    <td>{{ucfirst($non_active_user->user_type)}}</td>
                                                    <td>
                                                        <p class="btn btn-success">In-Active</p>
                                                    </td>
                                                    <td><button class="btn btn-warning"><a href="{{url('user_profile',[$non_active_user->id])}}">View profile</a></button></td>
                                                    <td><button class="btn btn-danger"><a href="{{url('user_delete',[$non_active_user->id])}}">Delete</a></button></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                @else
                                                <tr>
                                                    <td colspan="6">No Records Available</td>
                                                </tr>
                                                @endif
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
</body>

</html>