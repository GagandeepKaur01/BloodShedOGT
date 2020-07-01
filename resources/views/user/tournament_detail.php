<?php
session_start();

$connect = new mysqli('localhost', 'root', '', 'bloodshed');

// check user type and session
if (isset($_SESSION['username'])) {
    $role = trim($_SESSION['role']);
    if ($role == 'user') {
        $username = $_SESSION['username'];
    } else {
        header('Location: ../static/index.php');
    }
} else {
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

if (isset($_REQUEST['event_id'])) {
    $event_id = $_REQUEST['event_id'];
    $fetch_tournament_info = "SELECT * FROM `tournament_status` WHERE event_id = '$event_id'";
    $fetch = $connect->query($fetch_tournament_info);
    $event_detail = mysqli_fetch_assoc($fetch);
}

$available = "SELECT * FROM `tournament_records` WHERE `event_id` = '$event_id' ORDER BY position";

$granted = $connect->query($available);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username']; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../Jquery/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../Font/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="mymatches.css">
    <link rel="stylesheet" href="../static_css/header.css">
    <link rel="stylesheet" href="../static_css/foot.css">
    <link rel="stylesheet" href="../static_css/hamburgermenu.css">

</head>

<body>
    <?php include 'user_header.php'; ?>
    <div class="jumbotron profile_intro container-fluid px-0" style="padding-top: 10%;">
        <div class="intro">
            <h1><?php if (!empty($user_data['fullname'])) {
                    echo $user_data['fullname'];
                } else {
                    $user_data['username'];
                } ?></h1>
            <h5><?php echo $event_detail['tournament_name']; ?></h5>
        </div>
    </div>
    <div class="container">
        <div class="row p-0 m-0">
            <div class="col-12 p-0 m-0 mx-auto">
                <div class="match-detail mt-5">
                    <div class="matches-table">
                        <table class="table table-borderless table-striped table-hover table-scroll-vertical table">
                            <thead>
                                <tr>
                                    <td>Rank</td>
                                    <td>Player Name</td>
                                    <td>Game</td>
                                    <td>Game Type</td>
                                    <td>Prize</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($table_data = mysqli_fetch_assoc($granted)) { ?>
                                    <tr>
                                        <?php
                                        if ($table_data['position'] == '1') {
                                        ?>
                                            <td class="rank"><img class="img-fluid" src="../images/1stPlace.jpg" alt=""></td>
                                        <?php
                                        } elseif ($table_data['position'] == '2') {
                                        ?>
                                            <td class="rank"><img class="img-fluid" src="../images/2ndPlace.jpg" alt=""></td>
                                        <?php
                                        } elseif ($table_data['position'] == '3') {
                                        ?>
                                            <td class="rank"><img class="img-fluid" src="../images/3rdPlace.jpg" alt=""></td>
                                        <?php
                                        } else {
                                        ?>
                                            <td class="rank pl-4"><?php echo $table_data['position'] . '<sup>th</sup>'; ?></td>
                                        <?php
                                        }
                                        ?>
                                        <td><?php echo $table_data['player_username']; ?></td>
                                        <td><?php echo $table_data['game']; ?></td>
                                        <td><?php echo $table_data['game_type']; ?></td>
                                        <td><?php echo $table_data['prize'] ?></td>
                                    </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../static/footer.php';
    ?>

    <script src="../JavaScript/Home.js"></script>
    <script>
        function button() {
            document.getElementsByClassName("button")[0].classList.toggle("spin");
        }
    </script>
</body>

</html>