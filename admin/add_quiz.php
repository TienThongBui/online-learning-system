<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/db_connection.php';
include_once 'functions/admin_functions.php';
?>

<?php
$id = $_GET['id'];
$query = "select * from quiz_level where id = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$quiz_level = $row["quiz_level"];

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
        <h2>Add new quiz</h2>
        <br>
        <div class="cotainer">
            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add new quiz for <span class="text-danger"><?php echo $quiz_level ?></span></strong>
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

            <table id="data" class="table table-border text-center" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Quiz .No</th>
                        <th scope="col">Quiz</th>
                        <th scope="col">Option 1</th>
                        <th scope="col">Option 2</th>
                        <th scope="col">Option 3</th>
                        <th scope="col">Option 4</th>
                        <th scope="col">Answer</th>
                        <th scope="col">Level</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = $_GET['id'];
                    $query = "select * from quiz where quiz_level_id = '$id'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row["id"];
                        $quiz_no = $row["quiz_no"];
                        $quiz_name = $row["quiz_name"];
                        $opt1 = $row["opt1"];
                        $opt2 = $row["opt2"];
                        $opt3 = $row["opt3"];
                        $opt4 = $row["opt4"];
                        $answer = $row["answer"];
                        $level_id = $row["quiz_level_id"];
                        $quiz_level = $row["quiz_level"];

                        ?>
                        <tr>
                            <td>
                                <?php echo $quiz_no ?>
                            </td>
                            <td>
                                <?php echo $quiz_name ?>
                            </td>
                            <td>
                                <?php echo $opt1 ?>
                            </td>
                            <td>
                                <?php echo $opt2 ?>
                            </td>
                            <td>
                                <?php echo $opt3 ?>
                            </td>
                            <td>
                                <?php echo $opt4 ?>
                            </td>
                            <td>
                                <?php echo $answer ?>
                            </td>
                            <td>
                                <?php echo $quiz_level ?>
                            </td>
                            <td>
                                <a href="edit_quiz.php?qid=<?php echo $id ?>&quiz_level_id=<?php echo $level_id ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a href="delete_quiz.php?qid=<?php echo $id ?>&quiz_level_id=<?php echo $level_id ?>"><i class="fa-solid fa-trash"></i></a>
                            </td>


                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <?php
    add_quiz();
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