<?php
// CLARENCE
session_start();

// Include the database connection file
include("connection.php");

// Check if the form is submitted
if (!empty($_POST)) {
    // Get the user id from the session
    $user_id = $_SESSION['id'];

    // GET THE FORM DATA (IMAGES, TITLE, DESCRIPTION, SKILLS, EDUCATION)
    $image = $_FILES['image'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);

    // Create an array to hold the escaped values
    $escaped_education_values = array();

    // Loop through the education array and escape the values
    foreach ($_POST['education'] as $education) {
        $escaped_education_values[] = mysqli_real_escape_string($conn, $education);
    }

    // Implode the escaped education array
    $education_string = implode(", ", $escaped_education_values);

    // Check if the user has uploaded an image
    if (!empty($image) and !empty($title) and !empty($description) and !empty($skills) and !empty($education_string)) {
        // Get the image file name
        $image_name = $_FILES['image']['name'];

        // Get the image file size
        $image_size = $_FILES['image']['size'];

        // Get the image file type
        $image_type = $_FILES['image']['type'];

        // Get the image file temp name
        $image_tmp_name = $_FILES['image']['tmp_name'];

        // Get the image file extension
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

        // Create an array of allowed image extensions
        $allowed_image_extensions = array("jpg", "jpeg", "png", "gif");

        // Check if the image extension is allowed
        if (in_array($image_extension, $allowed_image_extensions)) {
            // Check if the image file size is less than 5MB
            if ($image_size < 5000000) {
                // Create a unique image name
                $unique_image_name = uniqid("IMG-", true) . "." . $image_extension;

                // Set the image upload path
                $image_upload_path = "../images/" . $unique_image_name;

                // Move the image to the upload path
                if (move_uploaded_file($image_tmp_name, $image_upload_path)) {
                    // Create a new portfolio
                    $create_portfolio_query = "INSERT INTO portfolio (userID, imagePath, title, description, skills, education) VALUES ('$user_id', '$unique_image_name', '$title', '$description', '$skills', '$education_string')";

                    // Execute the query
                    $create_portfolio_result = mysqli_query($conn, $create_portfolio_query);

                    // Check if the query was successful
                    if ($create_portfolio_result) {
                        // ALERT USING JAVASCRIPT
                        // If the session is admin, redirect to admin dashboard
                        if ($_SESSION['role'] == "admin") {
                            echo "<script>alert('Portfolio created successfully!'); window.location.href='../client/admin/admin-portfolio.php';</script>";
                        } else {
                            // If the session is client, redirect to client dashboard
                            echo "<script>alert('Portfolio created successfully!'); window.location.href='../client/members.php';</script>";
                        }
                    } else {
                        // ALERT USING JAVASCRIPT
                        echo "<script>alert('Failed to create portfolio!'); window.history.back();</script>";
                    }
                } else {
                    // ALERT USING JAVASCRIPT
                    echo "<script>alert('Failed to upload image!'); window.history.back();</script>";
                }
            } else {
                // ALERT USING JAVASCRIPT
                echo "<script>alert('Image size is too large!'); window.history.back();</script>";
            }
        } else {
            // EXTENSION NOT ALLOWED
            echo "<script>alert('Extension not allowed!'); window.history.back();</script>";
        }
    } else {
        // JAVASCRIPT ALERT
        echo "<script>alert('Please fill in all the fields!'); window.history.back();</script>";
    }

    // CLOSE THE CONNECTION
    mysqli_close($conn);
}
