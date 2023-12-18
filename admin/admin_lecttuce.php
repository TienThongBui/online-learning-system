<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Lecttuces</title>
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
</head>
<style>
    .main {
        margin-top: 30px;
        padding: 0px 10px;
    }

    /* #data tr {
        display: none;
    } */
</style>

<?php
include_once 'partitials/admin_sideMenu.php';
?>

<body>
    <div class="main">
        <div class="cotainer">
            <div class="row">
                <div class="col-md-12">
                    <h3>Video Lecttuces<span class="badge bg-primary"><a href="admin_add_videoLecttuce.php"
                                class="text-white">New</a></span></h3>
                    <table id="video-data" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Video</th>
                                <th scope="col">Level</th>
                                <th scope="col">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "select * from lecttuces where video_url != '';";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $lecttuces_id = $row['lecttuces_id'];
                                $lecttuces_name = $row['lecttuces_name'];
                                $video_name = $row['video_url'];
                                // $lecttuces_desc = $row['lecttuces_discription'];
                                $level = $row['level'];
                                $category_title = $row['category_title'];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $lecttuces_id ?>
                                    </td>
                                    <td>
                                        <?php echo $lecttuces_name ?>
                                    </td>
                                    <td>
                                        <?php echo $video_name ?>
                                    </td>
                                    <td>
                                        <?php echo $level ?>
                                    </td>
                                    <td>
                                        <?php echo $category_title ?>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3>PDFs Lecttuces<span class="badge bg-primary"><a href="admin_add_pdfLecttuce.php"
                                class="text-white">New</a></span></h3>
                    <table id="pdf-data" class="table table-border" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">PDF</th>
                                <th scope="col">Level</th>
                                <th scope="col">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "select * from lecttuces where pdf_url !='';";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $lecttuces_id = $row['lecttuces_id'];
                                $lecttuces_name = $row['lecttuces_name'];
                                $pdf_name = $row['pdf_url'];
                                // $lecttuces_desc = $row['lecttuces_discription'];
                                $level = $row['level'];
                                $category_title = $row['category_title'];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $lecttuces_id ?>
                                    </td>
                                    <td>
                                        <?php echo $lecttuces_name ?>
                                    </td>
                                    <td>
                                        <?php echo $pdf_name ?>
                                    </td>
                                    <td>
                                        <?php echo $level ?>
                                    </td>
                                    <td>
                                        <?php echo $category_title ?>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h3>Reading Lecttuces<span class="badge bg-primary"><a href="admin_add_readingLecttuce.php"
                                class="text-white">New</a></span></h3>
                    <table id="reading-data" class="table table-border" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Reading Passage</th>
                                <th scope="col">Level</th>
                                <th scope="col">Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "select * from lecttuces where reading_url !='';";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                $lecttuces_id = $row['lecttuces_id'];
                                $lecttuces_name = $row['lecttuces_name'];
                                $reading_url = $row['reading_url'];
                                // $lecttuces_desc = $row['lecttuces_discription'];
                                $level = $row['level'];
                                $category_title = $row['category_title'];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $lecttuces_id ?>
                                    </td>
                                    <td>
                                        <?php echo $lecttuces_name ?>
                                    </td>
                                    <td>
                                        <?php echo $reading_url ?>
                                    </td>
                                    <td>
                                        <?php echo $level ?>
                                    </td>
                                    <td>
                                        <?php echo $category_title ?>
                                    </td>

                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->



    <script>
        new DataTable('#video-data');
        new DataTable('#pdf-data');
        new DataTable('#reading-data');

    </script>
    
</body>

</html>