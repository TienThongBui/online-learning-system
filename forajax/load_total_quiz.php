<?php
     require_once '../includes/config_session.inc.php';
     require_once '../includes/db_connection.php';

    $total_quiz = 0;
    $query = "select * from quiz where quiz_level = '$_SESSION[quiz_level]'";
    $result = $conn -> query($query);
    $total_quiz = mysqli_num_rows($result);
    echo $total_quiz;
?>