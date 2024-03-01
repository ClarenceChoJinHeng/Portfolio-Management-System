<?php
// JUSTIN
session_start();

// Include the database connection file
include('connection.php');

if (isset($_POST['userID']) && $_POST['userID'] != '') {
    // Edit an existing user

    // Check if the form has been submitted
    if (!empty($_POST)) {
        // Get the form data
        $userID = mysqli_real_escape_string($conn, $_POST['userID']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Store the form data in the session
        $_SESSION['form_data'] = $_POST;

        // Validate the form data (javascript alert)
        if (empty($username)) {
            echo "<script>alert('Please fill in your username'); window.history.back();</script>";
            exit();
        } else if (empty($age)) {
            echo "<script>alert('Please fill in your age'); window.history.back();</script>";
            exit();
        } else if (empty($email)) {
            echo "<script>alert('Please fill in your email'); window.history.back();</script>";
            exit();
        } else if ($role != 'admin' && $role != 'user') {
            echo "<script>alert('Role must be admin or user'); window.history.back();</script>";
            exit();
        } else if (empty($password)) {
            echo "<script>alert('Please fill in your password'); window.history.back();</script>";
            exit();
        }

        // Age validation (must be over 18 and less than 70, must be a number)
        if (!is_numeric($age)) {
            echo "<script>alert('Please enter a valid age'); window.history.back();</script>";
            exit();
        } else if ($age < 18 || $age > 70) {
            echo "<script>alert('You must be between 18 and 70 years old to sign up'); window.history.back();</script>";
            exit();
        }

        // Email validation (check email format)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Please enter a valid email address'); window.history.back();</script>";
            exit();
        }

        // SQL query to update an existing user in the database
        $sql = "UPDATE users SET username = '$username', age = '$age', email = '$email', password = '$password', role = '$role' WHERE userID = $userID";

        try {
            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if the query was successful
            if ($result) {
                // If the query was successful, unset the form data session variable
                unset($_SESSION['form_data']);
                // If the query was successful, redirect the user to the admin users page (javascript alert)
                echo "<script>alert('User updated successfully'); window.location.href = '../client/admin/admin-users.php';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            // If the query was not successful, check if it was due to a duplicate entry
            if (mysqli_errno($conn) == 1062) {
                echo "<script>alert('Duplicate entry. The username or email is already in use.'); window.history.back();</script>";
            } else {
                // If the error was not due to a duplicate entry, output an error message
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
} else {
    // Create a new user
    // Check if the form has been submitted
    if (!empty($_POST)) {
        // Get the form data
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $age = mysqli_real_escape_string($conn, $_POST['age']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // Store the form data in the session
        $_SESSION['form_data'] = $_POST;

        // Validate the form data (javascript alert)
        if (empty($username)) {
            echo "<script>alert('Please fill in your username'); window.history.back();</script>";
            exit();
        } else if (empty($age)) {
            echo "<script>alert('Please fill in your age'); window.history.back();</script>";
            exit();
        } else if (empty($email)) {
            echo "<script>alert('Please fill in your email'); window.history.back();</script>";
            exit();
        } else if ($role != 'admin' && $role != 'user') {
            echo "<script>alert('Role must be admin or user'); window.history.back();</script>";
            exit();
        } else if (empty($password)) {
            echo "<script>alert('Please fill in your password'); window.history.back();</script>";
            exit();
        }

        // Age validation (must be over 18 and less than 70, must be a number)
        if (!is_numeric($age)) {
            echo "<script>alert('Please enter a valid age'); window.history.back();</script>";
            exit();
        } else if ($age < 18 || $age > 70) {
            echo "<script>alert('You must be between 18 and 70 years old to sign up'); window.history.back();</script>";
            exit();
        }

        // Email validation (check email format)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Please enter a valid email address'); window.history.back();</script>";
            exit();
        }

        // SQL query to insert a new user into the database
        $sql = "INSERT INTO users (username, age, email, password, role) VALUES ('$username', '$age', '$email', '$password', '$role')";

        try {
            // Execute the query
            $result = mysqli_query($conn, $sql);

            // Check if the query was successful
            if ($result) {
                // If the query was successful, unset the form data session variable
                unset($_SESSION['form_data']);
                // If the query was successful, redirect the user to the admin users page (javascript alert)
                echo "<script>alert('User created successfully'); window.location.href = '../client/admin/admin-users.php';</script>";
            }
        } catch (mysqli_sql_exception $e) {
            // If the query was not successful, check if it was due to a duplicate entry
            if (mysqli_errno($conn) == 1062) {
                echo "<script>alert('Duplicate entry. The username or email is already in use.'); window.history.back();</script>";
            } else {
                // If the error was not due to a duplicate entry, output an error message
                echo "Error: " . mysqli_error($conn);
            }
        }
    }
}
