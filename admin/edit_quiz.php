<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/db_connection.php';
include_once 'functions/admin_functions.php';
?>

<?php
$qid = $_GET['qid'];
$query = "select * from quiz where id = '$qid'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$quiz_name = $row["quiz_name"];

?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Quiz</title>
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
        <h2>Edit quiz</h2>
        <br>
        <div class="cotainer">
            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit quiz <span class="text-danger">
                                    <?php echo $quiz_name ?>
                                </span></strong>
                        </div>

                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Quiz .No" class=form-control-lable>
                                        Quiz .No
                                    </label>
                                    <input type="text" id="quiz_no" class="form-control" name="quiz_no">
                                </div>

                                <div class="form-group">
                                    <label for="Quiz name" class=form-control-lable>
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
                                    <label for="Answer" class=form-control-lable>
                                        Answer
                                    </label>
                                    <input type="text" id="answer" class="form-control" name="answer">
                                </div>

                                <div class="form-group mt-3">

                                    <input type="submit" class="btn btn-success" name="submit" value="Save quiz">
                                </div>
                            </div>
                            <form>
                    </div>
                </div>
            </div>



        </div>
    </div>

    <?php
    edit_quiz();
    ?>

    <script>
        new DataTable('#data');
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>