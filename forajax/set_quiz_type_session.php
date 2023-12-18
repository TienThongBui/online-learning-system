<?php
    require_once '../includes/config_session.inc.php';
    require_once '../includes/db_connection.php';

    $quiz_level=$_GET["quiz_level"];
    // $quiz_level = 'Beginning-A1';
    $_SESSION["quiz_level"]=$quiz_level;
    // $stmt = $pdo->query("select * from exam_category where category_title='$exam_category'");
    // while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
    //     $_SESSION["exam_time"] = $row['exam_time'];
    // }

    $query = "select * from quiz_level where quiz_level='$quiz_level'";
    // $query = "select * from question_level where quiz_level = 'Beginning-A1'";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc()) {
        $_SESSION['exam_time'] = $row['exam_time'];
    }

    // echo $row['exam_time'];
    $date = date("Y-m-d H:i:s");
    $_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
    $_SESSION["exam_start"] = "yes";
?>