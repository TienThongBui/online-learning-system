<?php
require_once '../includes/config_session.inc.php';
require_once '../includes/db_connection.php';
require_once '../functions/common_function.php';

if (isset($_SESSION['user_username'])) {
    echo '';
} else {
    $message = 'You need to login';
    // header('location: login.php');
    echo "<script type='text/javascript'>
    alert('$message');
    window.location.href='login.php';
    </script>";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/528e435c1a.js" crossorigin="anonymous"></script>
    <title>Title</title>
</head>

<style>
    .card {
        background-color: #ffebb3;
        width: 20rem;
        height: 25rem;
        margin: 20px auto;
        padding: 10px;
        border-radius: 1rem;
        box-shadow: 0 0 5rem rgba(0, 0, 0, 0.3);
        /* transition: 0.1s; */
    }

    .card:hover {
        background-color: #ffd86b;
        /* transform: translateY(-50px) rotate(-5deg); */
        box-shadow: 0 0 5rem rgba(0, 0, 0, 0.5);
    }

    .content {
        padding: 0 2rem;
    }

    h1 {
        font-family: 'Libre Baskerville';
    }

    p {
        font-family: 'Raleway';
    }
</style>

<body>
    <?php
     include "../partitials/header.php";
    ?>
    <div class="container">
        <div class="row">
            <h1 class="text-center">Choose an exam</h1>
            <?php
            $query = 'select * from quiz_level';
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                // $level = $row['level'];
                $quiz_level = $row['quiz_level'];
                $exam_time = $row['exam_time'];

                ?>
                <div class="col-3">
                    <div class="card">
                        <div class="content">
                            <h5>
                                Title:
                                <?php echo $quiz_level ?>
                            </h5>
                            <p><i class="fa-solid fa-clock"></i>
                                <?php echo $exam_time ?> minutes
                            </p>
                            <button type="button" class="btn btn-success form-control" value="<?php echo $quiz_level ?>"
                                onclick="set_quiz_type_session(this.value)">
                                Start exam
                            </button>
                        </div>
                    </div>
                </div>

                <?php
            }

            ?>
        </div>
    </div>








    <script type="text/javascript">
        function set_quiz_type_session(quiz_level) {
            $type = quiz_level;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    window.location = "quiz.php";
                }
            }
            xmlhttp.open("GET", "../forajax/set_quiz_type_session.php?quiz_level=" + quiz_level, true);
            xmlhttp.send(null);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>