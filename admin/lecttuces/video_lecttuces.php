<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
</head>
<style>
    .main {
        margin-top: 10px;
        margin-left: 70px;
        padding: 0px 10px;
    }
</style>

<body>
    <div class="main">
        <div class="container">
            <div class="row d-flex">
                <h4>Video lecttuce</h4>
                <a href="add_video_lecttuces.php">New</a>
                
            </div>
            <div class="row my-4">
                <table class="table table-primary table-striped table-hover table-bordered table-sm table-responsive-sm text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Video</th>
                            <th scope="col">Discription</th>
                            <th scope="col">Level</th>
                            <th scope="col">Category</th>
                            <th colspan="2">Edit</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php
                            $query = "select * from video_lecttuces";
                            $result = $conn ->query($query);
                            while ($row = $result -> fetch_assoc()) {
                                $lecttuces_id = $row["lecttuces_id"];
                                $lecttuces_name = $row["lecttuces_name"];
                                $video = $row["video_url"];
                                $lecttuces_desc = $row["lecttuces_discription"];
                                $level = $row["level"];
                                $category_title = $row["category_title"];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $lecttuces_id ?></th>
                            <td><?php echo $lecttuces_name ?></td>
                            <td><?php echo $video ?></td>
                            <td><?php echo $lecttuces_desc ?></td>
                            <td><?php echo $level ?></td>
                            <td><?php echo $category_title ?></td>
                            <td><a href="http://">Edit</a></td>
                            <td><a href="http://">Delete</a></td>
                        </tr>
                        <?php
                            }
                        ?>    
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>