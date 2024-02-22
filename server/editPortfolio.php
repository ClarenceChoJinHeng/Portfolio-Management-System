<?php

session_start();

// Include the database configuration file
include("connection.php");

// Check if the form is submitted
if (!empty($_POST)) {
    // RETRIEVE DATA FROM THE EDIT FORM (Image, Title, Description, Skills, Education, Portfolio ID)
    $image = $_FILES['image'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $portfolioID = $_POST['portfolioID'];

    // Create an array to hold the escaped values
    $escaped_education_values = array();

    // Loop through the education array and escape the values
    foreach ($_POST['education'] as $education) {
        $escaped_education_values[] = mysqli_real_escape_string($conn, $education);
    }

    // Implode the escaped education array
    $education_string = implode(", ", $escaped_education_values);

    if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
        // UPDATE PORTFOLIO WITHOUT IMAGE
        $update_query = "UPDATE portfolio SET title = '$title', description = '$description', skills = '$skills', education = '$education_string' WHERE portfolioID = '$portfolioID'";

        // EXECUTE THE QUERY
        if (mysqli_query($conn, $update_query)) {
            // IF SESSION[role] = admin, redirect to admin-portfolio.php
            // ELSE, redirect to members.php
            if ($_SESSION['role'] == 'admin') {
                echo "<script>alert('Portfolio updated successfully!'); window.location.href='../client/admin/admin-portfolio.php';</script>";
            } else {
                echo "<script>alert('Portfolio updated successfully!'); window.location.href='../client/members.php';</script>";
            }
        } else {
            // ALERT USING JAVASCRIPT
            echo "<script>alert('Failed to update portfolio!'); window.history.back();</script>";
        }
    } else {
        // FETCH THE CURRENT IMAGE PATH FROM THE DATABASE
        $fetch_image_query = "SELECT imagePath FROM portfolio WHERE portfolioID = '$portfolioID'";
        $result = mysqli_query($conn, $fetch_image_query);
        $row = mysqli_fetch_array($result);
        $old_image_path = '../images/' . $row['imagePath'];

        // DELETE THE OLD IMAGE
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        // UPDATE PORTFOLIO WITH IMAGE
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
                    // UPDATE PORTFOLIO WITH IMAGE
                    $update_query = "UPDATE portfolio SET imagePath = '$unique_image_name', title = '$title', description = '$description', skills = '$skills', education = '$education_string' WHERE portfolioID = '$portfolioID'";

                    // EXECUTE THE QUERY
                    if (mysqli_query($conn, $update_query)) {
                        // IF SESSION[role] = admin, redirect to admin-portfolio.php
                        // ELSE, redirect to members.php
                        if ($_SESSION['role'] == 'admin') {
                            echo "<script>alert('Portfolio updated successfully!'); window.location.href='../client/admin/admin-portfolio.php';</script>";
                        } else {
                            echo "<script>alert('Portfolio updated successfully!'); window.location.href='../client/members.php';</script>";
                        }
                    } else {
                        // ALERT USING JAVASCRIPT
                        echo "<script>alert('Failed to update portfolio!'); window.history.back();</script>";
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
            // ALERT USING JAVASCRIPT
            echo "<script>alert('Extension not allowed!'); window.history.back();</script>";
        }
    }

    // CLOSE THE CONNECTION
    mysqli_close($conn);
}
