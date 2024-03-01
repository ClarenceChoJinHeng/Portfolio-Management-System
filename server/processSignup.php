<?php
// KAI HONG

session_start();

include("connection.php");

if (isset($_POST['signup'])) {
    // GET THE DATA FROM THE FORM
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // DATA RETAIN (SESSION)
    $_SESSION['username'] = $username;
    $_SESSION['age'] = $age;
    $_SESSION['email'] = $email;

    // VALIDATION FOR THE DATA
    if (empty($username) && empty($age) && empty($email) && empty($password)) {
        die("<script>alert('Form cannot be empty');
        window.history.back();</script>");
    }

    if (empty($username)) {
        die("<script>alert('Please fill in your username');
        window.history.back();</script>");
    } else if (empty($age)) {
        die("<script>alert('Please fill in your age');
        window.history.back();</script>");
    } else if (empty($email)) {
        die("<script>alert('Please fill in your email');
        window.history.back();</script>");
    } else if (empty($password)) {
        die("<script>alert('Please fill in your password');
        window.history.back();</script>");
    }

    // VALIDATION FOR THE AGE (MAKING SURE THE AGE IS A NUMBER AND AGE IS GREATER OR EQUAL 18)
    if (!is_numeric($age)) {
        die("<script>alert('Please fill in a valid age');
        window.history.back();</script>");
    } else if ($age < 18) {
        die("<script>alert('You must be 18 years or older to sign up');
        window.history.back();</script>");
    }

    // VALIDATION FOR THE EMAIL (MAKING SURE THE EMAIL IS A VALID EMAIL)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("<script>alert('Please fill in a valid email');
        window.history.back();</script>");
    }

    // VALIDATION FOR PASSWORD (MAKING SURE THE PASSWORD IS AT LEAST 8 CHARACTERS LONG)
    if (strlen($password) < 8 || !preg_match("/[A-Z]{1,}/", $password) || !preg_match("/[a-z]{1,}/", $password) || !preg_match("/[0-9]{1,}/", $password)) {
        die("<script>alert('Please fill in a password that is at least 8 characters long');
        window.history.back();</script>");
    }

    // SQL QUERY TO SAVE THE DATA TO THE DATABASE
    $execute_query = "INSERT INTO users (username, age, email, password) VALUES ('$username', '$age', '$email', '$password')";

    // EXECUTE THE QUERY
    if (mysqli_query($conn, $execute_query)) {

        // UNSET THE SESSION
        unset($_SESSION['username']);
        unset($_SESSION['age']);
        unset($_SESSION['email']);

        echo "<script>alert('Signup successful');
        window.location.href = '../client/login.php';</script>";
    } else {
        echo "<script>alert('Signup failed');
        window.history.back();</script>";
    }

    // CLOSE THE CONNECTION
    mysqli_close($conn);
}
