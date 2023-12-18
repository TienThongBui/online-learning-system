<?php
     require_once '../includes/config_session.inc.php';
     require_once '../includes/db_connection.php';

    $total_listening_quiz=0;
    $stmt = $pdo->query("select * from exam_audio where category_title='$_SESSION[exam_category]'");
    $total_listening_quiz = $stmt->rowCount();
    echo $total_listening_quiz;
?>