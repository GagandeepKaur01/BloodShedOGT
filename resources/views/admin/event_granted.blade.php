<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Priviligies</title>
    <link rel="stylesheet" href="{{asset(url('css/bootstrap.css'))}}">
    <script src="{{asset(url('Jquery/jquery-3.4.1.js'))}}"></script>
    <script src="{{asset(url('js/bootstrap.js'))}}"></script>
    <link rel="stylesheet" href="{{asset('Font/fontawesome-free-5.12.0-web/css/all.css')}}">
    <link rel="stylesheet" href="{{asset(url('admin_css/admin_sidebar.css'))}}">
    <link rel="stylesheet" href="{{asset(url('admin_css/event_granted.css'))}}">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                                <p class="">{{Session::get('username')}}</p>
                                <p>Online</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>


            <!-- dashboard heading -->
            <div class="page_heading">
                <h2>Event</h2>
            </div>

            <!-- Approved and Ongoing Events -->
            <h1 class="text-center text-white">Ongoing and Upcoming Events</h1>
            <!-- Tabs -->
            <div class="tabs events mt-5">
                <ul class="diamond-cut">
                    <li>
                        <a href="#tab1">
                            <span>Approved Tournament</span></a>
                    </li>
                </ul>
                <div class="contents">
                    <div id="tab1">
                        <table class="table text-white text-center">
                            <thead>
                                <th>Event Name</th>
                                <th>Organizer Name</th>
                                <th>Game Type</th>
                                <th>Date and Time</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                               


                                @if(!empty($granted))
                                @foreach($granted as $print_today_event)
                                <tr>
                                    <td>{{$print_today_event->tournament_name}}</td>
                                    <td>{{$print_today_event->username_id}}</td>
                                    <td>{{$print_today_event->type}}</td>
                                    <td>{{$print_today_event->start_date}} & {{$print_today_event->time}}</td>
                                    <td><a href="{{url('organizer_checkevent', [$print_today_event->event_id])}}" class="btn btn-warning">View</a>
                                        <a href="{{url('delete',[$print_today_event->event_id])}}" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="6">No Tournament Available Today !</td>
                                </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <h1 class="text-center text-white mt-5">Pending Events Request</h1>
            <!-- Pending Rquest Events -->
            <div class="tabs events mt-5">
                <ul class="diamond-cut">
                    <li>
                        <a href="#tab1">
                            <span>Weekly</span></a>
                    </li>

                </ul>
                <div class="contents">
                    <div id="tab1">
                        <table class="table text-white text-center">
                            <thead>
                                <th>Event Name</th>
                                <th>Organizer Name</th>
                                <th>Game Type</th>
                                <th>Date and Time</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                @foreach ($pending as $key) {


                                <tr>
                                    <td>{{$key->tournament_name}}</td>
                                    <td>{{$key->username_id}}</td>
                                    <td>{{$key->type}}</td>
                                    <td>{{$key->start_date}} {{$key->time}}</td>
                                    <td>
                                        <form action="" method="get">
                                            @csrf()
                                            <button type="button" id="approved" class="btn btn-danger" value="{{$key->event_id}}">Click To Approve</button>
                                        </form>

                                        <a href="{{url('organizer_checkevent', [ $key->event_id])}}" class="btn btn-warning">View</a>
                                        <a href="{{url('delete',[$key->event_id])}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Javascript -->
    <script src="admin_js/sidebar.js "></script>
    <script type="text/javascript">
        $(function() {
            $(".tabs").tabs({
                show: {
                    effect: "fade",
                    direction: "right"
                },
                hide: {}
            });

            $('#approved').click(function() {
                let event_id = $('#approved').val();
                $.ajax({

                    type: 'get',
                    url: 'approving_event',

                    data: {
                        event_id: event_id
                    },
                    success: function(data) {
                        if (data == 'granted') {
                            window.location.reload();
                        } else {
                            alert('Something Wrong ! Contact Administrator');
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>