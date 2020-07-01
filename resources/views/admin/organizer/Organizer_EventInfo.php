<?php
session_start();
$connect = new mysqli('localhost', 'root', '', 'bloodshed');
if (!isset($_SESSION['username'])) {
    header('Location: ../../static/');
} else {
    $admin_username = $_SESSION['username'];
}
$data = array();
if (isset($_REQUEST['event_id'])) {
    $event_id = $_REQUEST['event_id'];

    // echo $event_id . "<br>";

    $select = "SELECT * FROM `tournament_status` WHERE `event_id`='$event_id'";
    if ($result = $connect->query(($select), MYSQLI_USE_RESULT)) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo $connect->error;
    }
}
// prize and time list json
// json time list file
$file = file_get_contents('../../organizer/time_list.json');

$time_array = json_decode($file, true);

// json prize list file
$prize_file = file_get_contents('../../organizer/prize_list.json');

$prize_array = json_decode($prize_file, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="../../Jquery/jquery-3.4.1.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <link rel="stylesheet" href="Organizer_EventInfoCSS.css">
    <link rel="stylesheet" href="../../Font/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../admin_css/admin_sidebar.css">
</head>

<body class="">

    <div class="wrapper">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
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
                                    <img src="../../images/profile.jpg" alt="">
                                </a>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <p class=""><?php echo ucwords($admin_username); ?></p>
                                <p>Online</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>


            <section class="mt-5 pt-5">
                <!-- 1st container -->
                <div class="container-fluid p-0 m-0 mt-5">
                    <!-- Page heading -->

                    <div class="main_heading">
                        <h1 class="heading text-white text-center mt-5 p-2">
                            EVENT DETAIL
                        </h1>
                    </div>
                </div>

                <!-- 2nd container -->
                <!-- Logo and Banner -->
                <div class="container-fluid  pt-3 pb-3 p-0 m-0 logo_banner">
                    <div class="row p-0 m-0">
                        <!-- Logo -->
                        <div class="logo col-md-6 position-relative">
                            <h2>GAME LOGO</h2>
                            <div class="logo_img">
                                <img src="<?php echo '../../' . $data['logo']; ?>" class="rounded img-fluid" alt="Logo">
                            </div>
                        </div>
                        <!-- Banner -->
                        <div class="banner col-md-6 position-relative">
                            <h2>GAME BANNER</h2>
                            <div class="banner_img">
                                <img src="<?php echo '../../' . $data['banner']; ?>" class="rounded d-block w-100" alt="Banner">

                            </div>

                        </div>
                    </div>
                </div>


                <!-- 3rd container  game info-->
                <div class="container-fluid third-section p-0 m-0 mt-5">
                    <div class="game_info">
                        <h1 class="text-center text-white">
                            BASIC INFO
                        </h1>
                    </div>
                    <div class="edit_page d-inline-block p-2" id="edit_button">
                        <img src="https://img.icons8.com/color/48/000000/settings.png" />
                    </div>
                    <article>
                        <div class="event_info">
                            <div class="info1">
                                <div class="head1">Game Name </div>
                                <div class="body1"><?php echo strtoupper($data['game'] . ' Mobile'); ?></div>
                            </div>

                            <div class="info2">
                                <div class="head1">Tournament Name </div>
                                <div class="body1"><?php echo strtoupper($data['tournament_name']); ?></div>
                            </div>
                            <div class="info3">
                                <div class="head1">Platform </div>
                                <div class="body1"><?php echo strtoupper($data['platform']); ?></div>
                            </div>
                            <div class="info4">
                                <div class="head1">Entry Fee </div>
                                <div class="body1"><?php echo strtoupper($data['price']); ?></div>
                            </div>
                            <div class="info5">
                                <div class="head1">Game Type</div>
                                <div class="body1"><?php echo strtoupper($data['type']); ?></div>
                            </div>
                            <div class="info6">
                                <div class="head1">Date & Time</div>
                                <div class="body1"><?php echo $data['start_date'] . ' ' . ' -> ' . $data['time'] . ' PM'; ?><br>Check-in -> <?php echo $data['check_in'] ?>PM</div>
                            </div>
                            <div class="info7">
                                <div class="head1">Place and Address</div>
                                <div class="body1"><?php echo $data['address']; ?></div>
                            </div>
                            <div class="info8 d-block">
                                <div id="accordion" class="">
                                    <div class="card" style="background-color: #192231;">
                                        <div class="card-header">
                                            <a href="#prize" data-toggle="collapse" class="card-link d-block">
                                                <h3>Prize [Click on it to see.]</h3>
                                            </a>
                                        </div>
                                        <div id="prize" class="collapse" data-parent="#accordion">
                                            <table class="table text-center w-75 mx-auto table-striped">
                                                <thead>
                                                    <th>Position</th>
                                                    <th>Prize</th>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $search =  array_search($event_id, array_column(json_decode($prize_file), 'event_id'));
                                                    $ss = $prize_array[$search];
                                                    $i = 1;
                                                    foreach (array_slice($ss, 1) as $key) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo 'Position ' . $i; ?></td>
                                                            <td><?php echo $key; ?></td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="info9 d-block">
                                <div id="accordion" class="">
                                    <div class="card" style="background-color: #192231;">
                                        <div class="card-header">
                                            <a href="#community" data-toggle="collapse" class="card-link d-block">
                                                <h3>Schedule [Click on it to see.]</h3>
                                            </a>
                                        </div>
                                        <div id="community" class="collapse" data-parent="#accordion">
                                            <table class="table text-center">
                                                <thead>
                                                    <th>Time</th>
                                                    <th>Team Limit</th>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $search =  array_search($event_id, array_column(json_decode($file), 'event_id'));
                                                    $ss = $time_array[$search];
                                                    $i = 1;
                                                    foreach (array_slice($ss, 1) as $key) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo 'Batch ' . $i; ?></td>
                                                            <td><?php echo $key; ?></td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </div>


    <script src="../admin_js/sidebar.js"></script>
</body>

</html>