<?php
    require_once '../includes/config_session.inc.php';
    require_once '../includes/db_connection.php';

    $exam_category=$_GET["exam_category"];
    $_SESSION["exam_category"]=$exam_category;
    $stmt = $pdo->query("select * from exam_category where category_title='$exam_category'");
    while ($row = $stmt->fetch(PDO::FETCH_BOTH)) {
        $_SESSION["exam_time"] = $row['exam_time'];
    }

    // echo $row['exam_time'];
    $date = date("Y-m-d H:i:s");
    $_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date."+$_SESSION[exam_time] minutes"));
    $_SESSION["exam_start"] = "yes";
?>