<?php

session_start();

include("connection.php");

// GET THE EMAIL OR USERNAME AND PASSWORD
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// VALIDATE THE DATA (EMAIL OR USERNAME AND PASSWORD)
if (empty($_POST['email']) or empty($_POST['password'])) {
    die("<script>alert('Please fill in your email or username and password');
    window.history.back();</script>");
}

// SQL QUERY TO CHECK IF THE EMAIL OR USERNAME AND PASSWORD MATCHES (CASE SENSITIVE)
$execute_query = "SELECT * FROM users WHERE (BINARY email = '$email' OR BINARY username = '$email') AND BINARY password = '$password' limit 1";

// EXECUTE THE QUERY
$result = mysqli_query($conn, $execute_query);

// CHECK IF THE EMAIL OR USERNAME AND PASSWORD MATCHES
if (mysqli_num_rows($result) == 1) {
    // CHECK THE ROLE IS ADMIN OR USER
    $data = mysqli_fetch_array($result);
    $_SESSION['username'] = $data['username'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['id'] = $data['userID'];

    if ($data['role'] == 'admin') {
        $_SESSION['role'] = 'admin';
        // REDIRECT TO admin.php
        echo "<script>alert('Successful Login As Admin'); window.location.href = '../client/admin/admin.php';</script>";
    } else {
        $_SESSION['role'] = 'user';
        // REDIRECT TO user.php
        echo "<script>alert('Successful Login As User'); window.location.href = '../client/members.php';</script>";
    }
} else {
    // LOGIN FAILED
    echo "<script>alert('Login failed');
    window.history.back();</script>";
}

// CLOSE THE CONNECTION
mysqli_close($conn);
