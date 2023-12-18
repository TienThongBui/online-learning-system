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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>Title</title>
    <link rel="stylesheet" href="../css/lecttucesV2.css">
    <link rel="stylesheet" href="../css/headNav.css">
    <!-- <link rel="stylesheet" href="../css/navbarv1.css">
    <link rel="stylesheet" href="../css/lecttucesV1.css"> -->

</head>
<style>
    .main {
        /* margin-top: 10px;
        margin-left: 70px;
        padding: 0px 10px; */
    }
</style>

<body>
    <?php
    include "../partitials/header.php";
    ?>

    <div class="main">
        <div class="container-fluid py-3 px-3">
            <div class="container">
                <div class="uni justify-content-center">
                    <div class="row">

                        <div class="col-2">
                            <div class="dropdown">
                                <h5>Skill</h5>
                                <div class="dropdown-content">
                                    <?php
                                    get_category();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="dropdown">
                                <h5>Level</h5>
                                <div class="dropdown-content">
                                    <?php
                                    get_level();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">

                            <div class="dropdown">
                                <h5><a href="select_exam.php">Exam</a></h5>

                            </div>


                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row d-flex my-2 mx-auto justify-content-center">
                        <?php
                        search_lecttuces();
                        get_uni_category();
                        get_uni_level();
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>