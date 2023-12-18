<?php
 require_once '../includes/config_session.inc.php';

 $questionNo=$_GET["questionNo"];
 $value1 = $_GET["value1"];
 $_SESSION["answer"][$questionNo] = $value1;

?>