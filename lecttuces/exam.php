<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';
require_once '../functions/common_fucntion.php';
?>

<?php
$id = $_GET['id'];
if (isset($_GET["id"])) {
}
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <title>Title</title>
    <script src="../js/search.js"></script>
</head>
<style>
    .main {
        margin-top: 10px;
        margin-left: 70px;
        padding: 0px 10px;
    }
</style>

<body>
    <?php
    include_once "../partitials/side_menu.php";
    ?>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <?php



                    $id = $_GET['id'];
                    if (isset($_GET['id'])) {
                        $query = "select * from video_lecttuces where lecttuces_id = '" . $id . "'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($result);
                        $id = $row['lecttuces_id'];
                        $lecttuces_name = $row['lecttuces_name'];
                        $video_url = $row['video_url'];
                        $lecttuces_desc = $row['lecttuces_discription'];
                        $level = $row['level'];
                        $category_title = $row['category_title'];
                        ?>


                        <div class="row d-flex justify-content-center bg-success">
                            <video src="../uploads<?=$video_url ?>" style="width: 80%; height: 50%" controls></video>
                        </div>
                        <div class="row d-flex justify-content-center align-items-center">
                            <h3>
                               <?php echo $lecttuces_name ?>
                            </h3>
                            <div class="row" style="background-color: #CCCCCC; border-radius: 15px;">
                                <h5>Discription:</h5>
                                <p style="font-size: 20px;">
                                   <?php echo $lecttuces_desc ?>
                                </p style="font-size: 20px;">

                                <h5>Level:</h5>
                                <p style="font-size: 20px;">
                                    <?php echo $level ?>
                                </p style="font-size: 20px;">
                            </div>
                        </div>

                        <?php
                    }
                    ?>



                    <?php
                    get_uni_lecttuces();
                    get_uni_category();
                    get_uni_level();
                    ?>
                </div>
                <div class="col-2">
                    <form class="" action="../user/search_lecttuces.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" name="search_data">
                        <input type="submit" value="Search" class="btn btn-outline-light btn-info"
                            name="search_data_lecttuces">
                    </form>
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


                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>