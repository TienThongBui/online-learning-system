<?php

if (isset($_POST["submit"])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $contact = $_POST["contact"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];

        require_once "db_connection.php";
        require_once "functions.inc.php";

        if (emptyInputSignup($firstname, $lastname, $username, $email, $contact, $password, $repassword) !== false) {
                header("location: ../admin_registration.php?error=emptyInput");
                die();
        }
        if (invalidUsername($username) !== false) {
                header("location: ../admin_registration.php?error=invalidUsername");
                die();
        }
        if (invalidEmail($email) !== false) {
                header("location: ../admin_registration.php?error=invalidEmail");
                die();
        }
        if (passwordMatch($password, $repassword) !== false) {
                header("location: ../admin_registration.php?error=passwordnotMatch");
                die();
        }
        if (usernameExsist($conn, $username) !== false) {
                header("location: ../admin_registration.php?error=usernameTaken");
                die();
        }

        createUser($conn, $firstname, $lastname, $username, $email, $contact, $password);

} else {
        header("location: ../admin_registration.php");
}

?>