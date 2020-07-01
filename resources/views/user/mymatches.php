<?php
session_start();

$connect = new mysqli('localhost', 'root', '', 'bloodshed');

if (isset($_SESSION['username']) == '') {
    header('Location: ../static/index.php');
}

if (isset($_SESSION['username'])) {
    $user_username = $_SESSION['username'];
    // select data for user info
    $select_user = "SELECT * FROM `register` WHERE `username` = '$user_username'";
    $result = $connect->query($select_user);
    $user_data = mysqli_fetch_array($result);


    $user_event_list = $user_data['event_list'];
    $user_event_array = explode(',', $user_event_list);
}

$all_event_info = array();
foreach ($user_event_array as $event_detail) {
    $select_user_played_event_info = "SELECT * FROM `tournament_status` WHERE event_id = '$event_detail'";
    $event_query = $connect->query($select_user_played_event_info);
    $row = mysqli_fetch_assoc($event_query);
    array_push($all_event_info, $row);
}

$player_tournament_records = array();
$select_user_event_info = "SELECT * FROM `tournament_records` WHERE player_username = '$user_username'";
$query = $connect->query($select_user_event_info);

while ($row = mysqli_fetch_assoc($query)) {
    array_push($player_tournament_records, $row);
}

$total_match = count($player_tournament_records);

$player_win_percentage = 0;
$first_position = 0;
foreach ($player_tournament_records as $player_static) {
    if ($player_static['position'] == '1' || $player_static['position'] == '2' || $player_static['position'] == '3') {
        $first_position++;
    }
    $player_win_percentage = (($first_position / $total_match) * 100);
}

// tournament_records and tournament_status array merged for combine result
$merged_event_info = array();
foreach ($player_tournament_records as $merge) {
    foreach ($all_event_info as $event_info_merge) {
        $merged_event_info[] = array_merge($event_info_merge, $merge);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../Jquery/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="mymatches.css">
    <link rel="stylesheet" href="../Font/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="../static_css/header.css">
    <link rel="stylesheet" href="../static_css/foot.css">
    <link rel="stylesheet" href="../static_css/hamburger.css">
</head>

<body>
    <!-- Navbar -->
    <?php
    include 'user_header.php';
    ?>

    <div class="jumbotron profile_intro container-fluid px-0" style="padding-top: 10%;">
        <div class="intro">
            <h1><?php if (!empty($user_data['fullname'])) {
                    echo $user_data['fullname'];
                } else {
                    $user_data['username'];
                } ?></h1>
            <p>Your Carrer</p>
            <h5><span class="pl-3">Win%: <?php echo $player_win_percentage . '%' ?><?php  ?></span></h5>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mx-auto text-center">
                <div class="matches">
                    <h1>My Matches</h1>
                </div>
            </div>
            <div class="col-md-12 mx-auto text-center">
                <div class="matches-table">
                    <table class="table table-borderless table-striped table-hover table-scroll-vertical table text-center">
                        <thead>
                            <tr>
                                <td>Result</td>
                                <td>Position</td>
                                <td>Prize</td>
                                <td>Game</td>
                                <td>Tournament View</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            foreach ($merged_event_info as $player_static) {
                                if ($player_static['position'] == '1' || $player_static['position'] == '2' || $player_static['position'] == '3') {
                            ?>
                                    <tr>
                                        <td><img class="img-fluid   " src="../images/victory2 - Copy.png" alt="">
                                            <p>Victory</p>
                                        </td>
                                        <td><?php echo $player_static['position']; ?></td>
                                        <td><?php echo $player_static['prize']; ?></td>
                                        <td><?php echo $player_static['tournament_name']; ?></td>
                                        <td>Classic <?php echo $player_static['game']; ?>
                                            <p><?php echo $player_static['start_date'] . ' ' . $player_static['time']; ?></p>
                                        </td>
                                        <td><a href="<?php echo 'tournament_detail.php?event_id=' . $player_static['event_id']; ?>"><i class="fas fa-caret-right"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                } else {
                                ?>
                                    <tr>
                                        <td><img class="img-fluid" src="../images/defeat2 - Copy.png" alt="">
                                            <p>Defeat</p>
                                        </td>
                                        <td>21</td>
                                        <td>21/6</td>
                                        <td>2432</td>
                                        <td>Match-Frontline
                                            <p>20-03-23 10:58:23</p>
                                        </td>
                                        <td><a href="User_MyMatches_Internal_Detail.html"><i class="fas fa-caret-right"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <!-- Footer -->
    <footer>
        <!-- Icons -->
        <div class="icons text-white">
            <ul class="nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
        <hr>
        <!-- For lg snd up screen -->
        <div class="container-fluid">
            <div class="row p-0 m-0">
                <!-- First Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>OG TOURNAMENT</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Home</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -> Hide on large or wider screen -->
                    <div id="accordion" class="d-lg-none">
                        <div class="card">
                            <div class="card-header">
                                <a href="#OG" data-toggle="collapse" class="card-link d-block">OG TOURNAMENT</a>
                            </div>
                            <div id="OG" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="#" class="nav-link text-white pl-5">Home</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link pl-5 text-white">Home</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link pl-5 text-white">Home</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link pl-5 text-white">Home</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Second Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>COMMUNITY</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -->
                    <div id="accordion" class="d-lg-none">
                        <div class="card">
                            <div class="card-header">
                                <a href="#community" data-toggle="collapse" class="card-link d-block">COMMUNITY</a>
                            </div>
                            <div id="community" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a href="#" class="nav-link pl-5 text-white">About</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link pl-5 text-white">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Third Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>SUPPORT</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Legality</a></li>
                                <li><a href="#">Refund & Cancellation Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -->
                    <div id="accordion" class="d-lg-none">
                        <div class="card">
                            <div class="card-header">
                                <a href="#support" data-toggle="collapse" class="card-link d-block">SUPPORT</a>
                            </div>
                            <div id="support" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Terms of
                                            Service</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Legality</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Refund &
                                            Cancellation Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fourth Column -->
                <div class="col-lg-3">
                    <!-- Custom Navbar -> Hide from xs to md devices -->
                    <div class="custom_navbar d-none d-lg-block">
                        <h3>FOLLOW US</h3>
                        <hr>
                        <div class="footer-navbar">
                            <ul>
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Twitter</a></li>
                                <li><a href="#">YouTube</a></li>
                                <li><a href="#">Instagram</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Accordions -->
                    <div id="accordion" class="d-lg-none w-100 bg-danger">
                        <div class="card w-100 bg-danger">
                            <div class="card-header">
                                <a href="#follow" data-toggle="collapse" class="card-link d-block">FOLLOW US</a>
                            </div>
                            <div id="follow" class="collapse" data-parent="#accordion">
                                <ul class="navbar-nav">
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Facebook</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Twitter</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">YouTube</a></li>
                                    <li class="nav-item"><a class="nav-link pl-5 text-white" href="#">Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="../JavaScript/Home.js"></script>
</body>

</html>                                           