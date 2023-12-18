<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/db_connection.php';
include_once 'functions/admin_functions.php';


// delete_quiz();

$qid = $_GET['qid'];

$delete = "delete from lecttuces_quiz where qid = '".$qid."'";
mysqli_query($conn, $delete);
// header("location: admin_lecttuce.php");
echo ("<meta http-equiv='refresh' content='0'>");
?>
