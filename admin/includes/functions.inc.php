<?php

function emptyInputSignup($firstname, $lastname, $username, $email, $contact, $password, $repassword)
{
    // $result;
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($contact) || empty($password) || empty($repassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUsername($username)
{
    // $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    // $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($password, $repassword)
{
    if ($password !== $repassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function usernameExsist($conn, $username, $email)
{
    $sql = "select * from users where username = ? or email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin_registration.php?error=stmtFailed");
        die();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstname, $lastname, $username, $email, $contact, $password)
{
    $sql = "insert into users (firstname, lastname, username, email, contact, password) 
    values (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../admin_registration.php?error=stmtFailed");
        die();
    }

    $hasedPassword = password_hash($password, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, "ssssss", $firstname, $lastname, $username, $email, $contact, $hasedPassword);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../admin_registration.php?error=none");
}

// login funtions

function emptyInputLogin($username, $password) {
    if (empty($username) || empty($password)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser( $conn, $username, $password ) {  
    $usernameExsist = usernameExsist($conn, $username, $username);

    if($usernameExsist === false) {
        header("location: ../admin_login.php?error=wrongLogin");
        die();
    }

    $passwordHased = $usernameExsist["password"];
    $checkPassword = password_verify($password, $passwordHased);

    if( $checkPassword === false ) {
        header("location: ../admin_login.php?error=wrongLogin");
        die();
    }
    elseif ($checkPassword === true) {
        session_start();
        $_SESSION["user_id"] = $usernameExsist["id"];
        $_SESSION["user_username"] = $usernameExsist["username"];
        header("location: ../admin_dashboard.php");
        die();
    }
}  