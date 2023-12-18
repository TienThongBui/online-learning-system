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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Dashboard</title>
    <!-- <script src="../js/search.js"></script> -->
    <link rel="stylesheet" href="../css/navbarv1.css">
    <link rel="stylesheet" href="../css/lecttucesV1.css">
</head>
<style>
    .main {
        /* margin-top: 16px;
        margin-left: 70px;
        padding: 0px 10px; */
    }
</style>

<body>
    <?php
    include "../partitials/header.php";
    ?>

    <div class="main">
        <div class="container py-3 px-3">

            <div class="uni d-flex justify-content-center">
                <div class="row w-50">
                    <div class="col-1">
                        <div class="dropdown">
                            <h5>Category</h5>
                            <div class="dropdown-content">
                                <?php
                                get_category();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="dropdown">
                            <h5>Level</h5>
                            <div class="dropdown-content">
                                <?php
                                get_level();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <div class="row d-flex my-2 mx-5 justify-content-center">
                        <h5 class="text-center">PDF Lecttures</h5>
                        <?php
                        // get_video_lecttuces();
                        get_pdf_lecttuces();
                        get_uni_category();
                        get_uni_level();
                        ?>


                    </div>
                </div>


                <!-- <div class="col-2">

                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                            <a href="" class="nav-link text-light">Level</a>
                        </li>
                        <?php
                        get_level();

                        ?>

                    </ul>

                    <ul class="navbar-nav me-auto text-center">
                        <li class="nav-item bg-info">
                            <a href="" class="nav-link text-light">Category</a>
                        </li>
                        <?php
                        get_category();
                        ?>

                    </ul>


                </div> -->

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>