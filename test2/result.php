<?php
require_once "../includes/config_session.inc.php";
require_once "../includes/db_connection.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Title</title>
    <link rel="stylesheet" href="../css/result.css">

</head>


<body>

    <?php

    $correct = 0;
    $wrong = 0;

    if (isset($_SESSION["answer"])) {
        for ($i = 0; $i <= sizeof($_SESSION["answer"]); $i++) {
            $answer = "";
            $query = "select * from quiz where quiz_level = '$_SESSION[quiz_level]' && quiz_no = $i";
            $result = $conn->query($query);
            while ($row = $result->fetch_array()) {
                $answer = $row["answer"];
            }

            if (isset($_SESSION['answer'][$i])) {
                if ($answer == $_SESSION["answer"][$i]) {
                    $correct = $correct + 1;
                } else {
                    $wrong = $wrong + 1;
                }
            } else {
                $wrong = $wrong + 1;
            }
        }
    }

    $count = 0;

    $query = "select * from quiz where quiz_level = '$_SESSION[quiz_level]'";
    $result = $conn->query($query);
    $count = mysqli_num_rows($result);
    $wrong = $count - $correct;
    ?>

    <div class="container border border-1 p-4">
        <div class="row">
            <h1>Result</h1>
        </div>
        <hr>
        <div class="row">
            <p>Congratulation!<a href="../user/profile.php">See all your result</a></p>
        </div>
        <div class="row border border-2 text-center p-1">
            <h5>Total result:
                <?php echo $count ?>
            </h5>
        </div>
        <div id="correct" class="row border border-2 text-center p-1">
            <h5>Correct answer:
                <?php echo $correct ?>
            </h5>
        </div>
        <div class="row border border-2 text-center p-1">
            <h5>Wrong answer:
                <?php echo $wrong ?>
            </h5>
        </div>

        <a href="../user/dashboard.php" class="d-flex">
            <button value="back">
                Back
            </button>
        </a>

    </div>

    <?php
    $insert = "insert into exam_results (username, exam_type, total_question, correct_answer, wrong_answer, create_at) 
            values ('$_SESSION[user_username]', '$_SESSION[quiz_level]', '$count', '$correct', '$wrong', NOW())";
    $result = $conn->query($insert);
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
</body>

</html>