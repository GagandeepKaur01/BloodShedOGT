<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Data</title>
    <link rel="stylesheet" href="{{asset(url('css/bootstrap.css'))}}">
    <script src="{{asset(url('Jquery/jquery-3.4.1.js'))}}"></script>
    <script src="{{asset(url('js/bootstrap.js'))}}"></script>
    <link rel="stylesheet" href="{{asset('Font/fontawesome-free-5.12.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset(url('admin_css/org_data.css'))}}">
    <link rel="stylesheet" href="{{asset(url('admin_css/admin_sidebar.css'))}}">
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
                <h2>Organizer Module</h2>
            </div>

         
            <!-- Body Content -->

          
       
                <div class="container-fluid user_table_content">
                    <div class="row">
                        <div class="col-12 p-0">
                            <div class="User_data">
                                <div class="table_upper_heading">
                                    <h1 class="text-white text-center">Registered Organizer</h1>
                                </div>
                                <div class="table_heading">
                                    <i class="fas fa-table"></i>
                                </div>
                                <table class="table text-white">
                                    <caption class="text-white pl-3">Organizer Info</caption>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                           
                                            <th>View profile</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($organizer_all_data))
                                        @foreach($organizer_all_data as $active_user)
                                        <tr>
                                            <td> @if(!empty($active_user->fullname)) {{$active_user->fullname}} @else {{$active_user->username}} @endif </td>
                                            <td>{{$active_user->email}}</td>
                                            <td>{{ucfirst($active_user->user_type)}}</td>
                                           
                                            <td><button class="btn btn-warning"><a href="{{url('org_profile',[$active_user->id])}}">View profile</a></button></td>
                                            <td><button class="btn btn-danger"><a href="{{url('org_delete',[$active_user->id])}}">Delete</a></button></td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6">Record Not Available</td>
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