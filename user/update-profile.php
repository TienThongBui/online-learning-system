<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';
require_once '../functions/common_function.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Profile</title>
    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/navbarv1.css">
    <link rel="stylesheet" href="../css/profile2.css">
</head>


<body>
    <?php
     include "../partitials/header.php";
    ?>


    <?php
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_username"];

    $query = "select * from users where id = '$user_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $id = $row["id"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $username = $row["username"];
    $email = $row["email"];
    $phone = $row["contact"];
    ?>


    <div class="main">
        <div class="container px-2 mt-4">
            <div class="row">
                <div class="col-3 text-center">
                    <h2>Your profile</h2>
                    <!-- <div class="card text-center sideBar">
                        <div class="card-body">
                            <div class="mt-3">
                                <h3>
                                    <?php echo $username ?>
                                </h3>
                                <a href="update-profile.php">
                                    <h5>Update</h5>
                                </a>
                                <hr>
                                <div class="mt-2">
                                    <h5>
                                        <a href="profile.php">Home</a>
                                    </h5>
                                    <h5>
                                        <a href="allResult.php">Result</a>
                                    </h5>

                                </div>
                            </div>
                        </div>
                    </div> -->

                    <nav class="navbar my-3 border border-2 justify-content-center" id="sideMenu">
                        <ul class="navbar-nav">
                            <li class="nav-item my-2">
                                <a href="../user/profile.php">
                                    <h4>
                                        <?php echo $username ?>
                                    </h4>
                                </a>
                            </li>

                            <hr>

                            <li class="nav-item my-2">
                                <a href="profile.php">
                                    <h4 class="nav-text">Dashboard</h4>
                                </a>
                            </li>

                            <li class="nav-item my-2">
                                <a href="update-profile.php">
                                    <h4 class="nav-text">Update</h4>
                                </a>
                            </li>

                            <li class="nav-item my-2">
                                <a href="allResult.php">
                                    <h4 class="nav-text">Result</h4>
                                </a>
                            </li>

                            <li class="nav-item my-2">
                                <a href="../includes/logout.inc.php">
                                    <h4 class="nav-text">Logout</h4>
                                </a>
                            </li>


                        </ul>
                    </nav>
                </div>

                <div class="col-9">
                    <div class="row">
                        <?php
                            update_user();
                        
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>