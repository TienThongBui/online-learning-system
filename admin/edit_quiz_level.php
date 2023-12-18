<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/db_connection.php';
include_once 'functions/admin_functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz Level</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
        <h2 class="text-center">Edit exam</h2>
        <br>
        <div class="cotainer">
            <div class="row mb-5">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add new quiz level</strong>
                        </div>

                        <form action="" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="Quiz level" class=form-control-lable>
                                        Quiz level
                                    </label>
                                    <input type="text" id="quiz_level" class="form-control" name="quiz_level">
                                </div>

                                <div class="form-group">
                                    <label for="Exam time" class=form-control-lable>
                                        Time (in minutes)
                                    </label>
                                    <input type="text" id="exam_time" class="form-control" name="exam_time">
                                </div>

                                <div class="form-group mt-3">

                                    <input type="submit" class="btn btn-success" name="submit" value="Add level">
                                </div>
                            </div>
                            <form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php
    edit_quiz_level();
    ?>

</body>

</html>