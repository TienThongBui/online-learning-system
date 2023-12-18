<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';
require_once '../functions/common_function.php';

if (isset($_SESSION['user_username'])) {
    echo '';
} else {
    $message = 'You need to login';
    header('location: login.php');
    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src='https://code.jquery.com/jquery-3.7.0.js'></script>
    <!-- Data Table JS -->
    <script src='https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css'></script>
    <script src='https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js'></script>
    <link src='https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css' rel="stylesheet">
    <script src='https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js'></script>
    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="../css/navbarv1.css"> -->
    <link rel="stylesheet" href="../css/profilev1.css">
    <link rel="stylesheet" href="../css/headNav.css">

</head>

<style>
    /* The sidebar menu */
    .sideNav {
        height: 90%;
        width: 160px;
        position: fixed;
        /* Fixed Sidebar (stay in place on scroll) */
        z-index: 1;
        background-color: #fff;
        padding-top: 20px;
    }

    /* The navigation menu links */
    .sideNav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
    }

    /* When you mouse over the navigation links, change their color */
    .sideNav a:hover {
        color: #000000;
    }
</style>


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
    $picture = $row["img"];
    ?>


    <div class="main">
        <div class="container px-2 mt-4">
            <div class="row">
                <div class="col-3 text-center">
                    <div class="sideNav">
                        <h3>Your profile</h3>
                        <img src="uploads/<?php echo $picture ?>" style="width:100px;height:100px;">
                        <a href="profile.php?update">Update</a>
                        <hr>
                        <a href="profile.php?dashboard">Dashboard</a>
                        <a href="profile.php?bookmark">Bookmark</a>
                        <a href="profile.php?result">Result</a>
                        <a href="../includes/logout.inc.php">Logout</a>
                        <hr>
                        <a href="delete_account.php" class="text-danger">Delete account</a>
                    </div>

                </div>

                <div class="col-9 my-4">
                    <div class="row">
                        <?php
                        dashboard_sum();
                        update_user();
                        user_bookmark();
                       
                        result_details();
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->

    


    <script>
        new DataTable('#data');
    </script>

</body>

</html>