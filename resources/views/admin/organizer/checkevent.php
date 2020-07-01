<?php
// error_reporting(0);
session_start();
$connect = new mysqli('localhost', 'root', '', 'bloodshed');
if (!isset($_SESSION['username'])) {
    header('Location: ../../static/');
} else {
    $admin_username = $_SESSION['username'];
}

if (isset($_REQUEST['org_id'])) {
    $id = $_REQUEST['org_id'];

    $query = "SELECT * FROM `register` WHERE `id` = '$id'";

    $result = $connect->query($query);
    $organizer = mysqli_fetch_assoc($result);
}

$organizer_username = $organizer['username'];
// fetch all organizer data
$all_org_data = array();
$fetch_all_organizer_event = "SELECT * FROM `tournament_status` WHERE username_id = '$organizer_username'";
$result = $connect->query($fetch_all_organizer_event);
while ($row = mysqli_fetch_assoc($result)) {
    array_push($all_org_data, $row);
}


// Approve statement
if (isset($_POST['grant'])) {
    $approve = $_POST['grant'];
    $event_id = $_POST['event_id'];
    $grant = "UPDATE `tournament_status` SET status = '$approve' WHERE event_id = '$event_id'";
    if ($connect->query($grant)) {
        echo "granted";
    } else {
        echo "denied";
    }
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Event</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <script src="../../Jquery/jquery-3.4.1.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../Font/fontawesome-free-5.12.0-web/css/all.css">
    <link rel="stylesheet" href="checkevent.css">
    <link rel="stylesheet" href="../admin_css/admin_sidebar.css">

</head>

<body>
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


            <!-- dashboard heading -->
            <div class="page_heading">
                <h2>Event</h2>
            </div>

            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="event_first_heading col-12">
                        <h1>Pending Event</h1>
                    </div>
                    <div class="col-6 col-sm-5 col-md-3">
                        <select name="" id="" class="form-control">
                            <option value="">Month</option>
                            <option value="">This Month</option>
                            <option value="">Next Month</option>
                        </select>
                    </div>
                </div>
            </div>


            <!-- cards -->
            <div class="container-fluid mt-5">
                <div class="row">
                    <?php
                    foreach ($all_org_data as $pending) {
                        if ($pending['status'] == 'pending') {
                    ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card">
                                    <img src="<?php echo '../../' . $pending['banner']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $pending['tournament_name']; ?>
                                        </h5>
                                        <p class="card-subtitle">
                                            <p>Status: <?php echo ucfirst($pending['status']); ?></p>
                                            <p>Prize: <?php echo $pending['prize']; ?></p>
                                            <p>Starts: <?php echo $pending['start_date'] . ' ' . $pending['time']; ?>PM IST</p>
                                        </p>
                                        <a href="<?php echo "Organizer_EventInfo.php?event_id=" . $pending['event_id']; ?>" class="btn btn-primary">View</a>
                                        <button type="button" id="approved" class="btn btn-danger" value="<?php echo $pending['event_id']; ?>">Click To Approve</button>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="rounded text-center w-100 p-3 mt-1" style="background-color: #192231;"><strong>
                                    <p>You have not any pending tournament.</p>
                                </strong></div>
                    <?php
                            break;
                        }
                    }
                    ?>
                </div>
            </div>


            <!-- All event  -->
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="event_first_heading-2 col-12">
                        <h1>Event</h1>
                    </div>
                    <div class="col-3">
                        <select name="" id="" class="form-control">
                            <option value="">Month</option>
                            <option value="">This Month</option>
                            <option value="">Next Month</option>
                        </select>
                    </div>
                </div>
            </div>


            <!-- cards -->
            <div class="container-fluid mt-5">
                <div class="row">
                    <?php
                    foreach ($all_org_data as $pending) {
                        if ($pending['status'] == 'granted') {
                    ?>
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card">
                                    <img src="<?php echo '../../' . $pending['banner']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $pending['tournament_name']; ?>
                                        </h5>
                                        <p class="card-subtitle">
                                            <p>Status: <?php echo ucfirst($pending['status']); ?></p>
                                            <p>Prize: <?php echo $pending['prize']; ?></p>
                                            <p>Starts: <?php echo $pending['start_date'] . ' ' . $pending['time']; ?>PM IST</p>
                                        </p>
                                        <a href="<?php echo "Organizer_EventInfo.php?event_id=" . $pending['event_id']; ?>" class="btn btn-primary">View</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="../admin_js/sidebar.js"></script>
    <script>
        $(function() {
            $('#approved').click(function() {
                let event_id = $('#approved').val();
                $.ajax({
                    url: 'checkevent.php',
                    type: 'post',
                    data: {
                        grant: 'granted',
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