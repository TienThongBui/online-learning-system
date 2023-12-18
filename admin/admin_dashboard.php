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

<body>


    <div class="container">
        <?php
            include_once "partitials/admin_sideMenu.php";
        ?>
        <div class="row pt-4">
            <div class="col-12">
                <div class="row">

                    <div class="col-md-3 my-1">
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

                    <div class="col-md-3 my-1">
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

                    <div class="col-md-3 my-1">
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

                    <div class="col-md-3 my-1">
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

                    <div class="col-md-3 my-1">
                        <div class="card border border-2">
                            <div class="card-header">
                                <h3>Total Exam:</h3>
                            </div>
                            <div class="card-body">
                                <?php
                                $query = "select count(id) from quiz_level";
                                $result = mysqli_query($conn, $query);
                                $row = mysqli_fetch_assoc($result);
                                $total_exams = $row["count(id)"];
                                echo '<h5> ' . $total_exams . ' </h5>';
                                ?>
                                <hr>
                                <a href="admin_quiz_level.php">
                                    <button class="btn btn-primary">Details</button>
                                </a>
                            </div>
                        </div>
                    </div>


                   

                </div>
            </div>
        </div>
    </div>
</body>

</html>