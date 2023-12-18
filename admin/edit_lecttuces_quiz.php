<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/db_connection.php';
?>

<?php
$qid = $_GET['qid'];
$query = 'select * from lecttuces_quiz where qid = "' . $qid . '";';
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
// $lecttuces_id = $row['lecttuces_id'];
// $lecttuces_name = $row['lecttuces_name'];
$quiz_no = $row['quiz_no'];
$quiz_name = $row['quiz_name'];
$opt1 = $row['opt1'];
$opt2 = $row['opt2'];
$opt3 = $row['opt3'];
$opt4 = $row['opt4'];
$answer = $row['answer'];
// $lecttuces_id = $row['lecttuces_id']
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Video Lecttuce</title>
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
</style>

<?php
include_once 'partitials/admin_sideMenu.php';
?>

<body>


    <div class="main">
        <h2>Add quiz question</h2>
        <br>
        <div class="cotainer">
            <div class="row mb-5">
                <div class="col">
                    <div class="card">

                        <div class="card-header">
                            <strong>Edit quiz number <span class="text-danger">
                                    <?php echo $quiz_no ?>
                                </span></strong>
                        </div>



                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="Quiz" class=form-control-lable>
                                        Quiz
                                    </label>
                                    <input type="text" id="quiz_name" class="form-control" name="quiz_name">
                                </div>

                                <div class="form-group">
                                    <label for="Option 1" class=form-control-lable>
                                        Option 1
                                    </label>
                                    <input type="text" id="opt1" class="form-control" name="opt1">
                                </div>

                                <div class="form-group">
                                    <label for="Option 2" class=form-control-lable>
                                        Option 2
                                    </label>
                                    <input type="text" id="opt2" class="form-control" name="opt2">
                                </div>

                                <div class="form-group">
                                    <label for="Option 3" class=form-control-lable>
                                        Option 3
                                    </label>
                                    <input type="text" id="opt3" class="form-control" name="opt3">
                                </div>

                                <div class="form-group">
                                    <label for="Option 4" class=form-control-lable>
                                        Option 4
                                    </label>
                                    <input type="text" id="opt4" class="form-control" name="opt4">
                                </div>

                                <div class="form-group">
                                    <label for="Correct answer" class=form-control-lable>
                                        Correct answer
                                    </label>
                                    <input type="text" id="answer" class="form-control" name="answer">
                                </div>

                                <div class="form-group mt-3">
                                    <input type="submit" class="btn btn-success" name="submit" value="Save question">
                                </div>
                            </div>
                            <form>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <?php
    // add_video_lecttuce();
    

    if (isset($_POST['submit'])) {
        $qid = $_GET['qid'];
        // $quiz_no = $_POST['quiz_no'];
        $quiz_name = $_POST['quiz_name'];
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        $opt3 = $_POST['opt3'];
        $opt4 = $_POST['opt4'];
        $answer = $_POST['answer'];
        $query = "update lecttuces_quiz set quiz_name='$quiz_name', opt1='$opt1', opt2='$opt2', opt3='$opt3', opt4='$opt4', answer='$answer' where qid = $qid;";
        $result = mysqli_query($conn, $query);
        echo "<script type='text/javascript'>alert('Your data is updated!');</script>";
        echo "<meta http-equiv='refresh' content='0'>";
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>


    <script>
        // new DataTable('#data');
    </script>

</body>

</html>