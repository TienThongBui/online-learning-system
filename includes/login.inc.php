<?php

if (isset($_POST["submit"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	require_once "db_connection.php";
	require_once "functions.inc.php";

	if (emptyInputLogin($username, $password) !== false) {
		header("location: ../user/login.php?error=emptyInput");
		die();
	}
	
	loginUser($conn, $username, $password);

	

} else {
	header("location: ../user/registration.php");
}

?>



?>