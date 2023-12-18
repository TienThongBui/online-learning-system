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
    <title>Dashboard</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/lecttucesV2.css">
    <link rel="stylesheet" href="../css/headNav.css">
</head>


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
                    <div class="row d-flex my-2 mx-5 justify-content-center">
                        <?php
                        get_pagination();
                        get_uni_category();
                        get_uni_level();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>