<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/db_connection.php';
require_once 'functions/admin_functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
</head>
<style>
    /* The sidebar menu */
    .sideNav {
        height: 90%;
        width: 160px;
        /* position: fixed; */
        /* Fixed Sidebar (stay in place on scroll) */
        /* z-index: 1;
        background-color: #fff; */
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

    .main {
        margin-top: 30px;
        padding: 0px 10px;
    }
</style>

<?php
include_once 'partitials/admin_sideMenu.php';
?>



<body>
    <div class="main">
        <div class="container px-2 mt-4">
            <div class="row">
                <div class="col-3 text-center">
                    <div class="sideNav">
                        <h3>Dashboard</h3>

                        <a href="profile.php?update">Update</a>
                        <hr>
                        <a href="profile.php?dashboard">Dashboard</a>
                        <a href="profile.php?bookmark">Bookmark</a>
                        <a href="profile.php?result">Result</a>
                        <a href="../includes/logout.inc.php">Logout</a>
                    </div>

                </div>

                <div class="col-9 my-4">
                    <div class="row justify-content-around">
                        <div class="col-md-5 m-1">
                            <div class="card border border-2">
                                <div class="card-header">
                                    <h3>Total lesson:</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $query = "select count(lecttuces_id) from lecttuces";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $total_lecttuces = $row["count(lecttuces_id)"];
                                    echo '<h5> ' . $total_lecttuces . ' </h5>';
                                    ?>
                                    <hr>
                                    <a href="admin_lecttuce.php">
                                        <button class="btn btn-primary">Details</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 m-1">
                            <div class="card border border-2">
                                <div class="card-header">
                                    <h3>Total Level:</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $query = "select count(level_id) from level";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $total_level = $row["count(level_id)"];
                                    echo '<h5> ' . $total_level . ' </h5>';
                                    ?>
                                    <hr>
                                    <a href="admin_level.php">
                                        <button class="btn btn-primary">Details</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 m-1">
                            <div class="card border border-2">
                                <div class="card-header">
                                    <h3>Total Category:</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $query = "select count(category_id) from category";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $total_category = $row["count(category_id)"];
                                    echo '<h5> ' . $total_category . ' </h5>';
                                    ?>
                                    <hr>
                                    <a href="admin_category.php">
                                        <button class="btn btn-primary">Details</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 m-1">
                            <div class="card border border-2">
                                <div class="card-header">
                                    <h3>Total User:</h3>
                                </div>
                                <div class="card-body">
                                    <?php
                                    $query = "select count(id) from users";
                                    $result = mysqli_query($conn, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $total_users = $row["count(id)"];
                                    echo '<h5> ' . $total_users . ' </h5>';
                                    ?>
                                    <hr>
                                    <a href="admin_user.php">
                                        <button class="btn btn-primary">Details</button>
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>